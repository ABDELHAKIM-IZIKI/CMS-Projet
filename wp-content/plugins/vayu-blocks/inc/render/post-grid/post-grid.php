<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


class VayuBlocksPostGrid {
    private $attr;
    private $device_type;

    public function __construct($attr) {
        $this->attr = $attr;
        $this->device_type = $this->get_device_type();
    }

    //render all post
    public function render_posts() {

        // Get the current post's permalink
        $current_post_link = get_permalink();
        
        // Extract the post ID from the permalink
        $post_id = get_the_ID(); // Alternatively, you can parse the URL to get the ID

        // Construct the pagination URL
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $pagination_link = home_url('/' . get_post_type() . '/' . $post_id . '/page/' . ($paged + 1) . '/');

        $columns = $this->attr['pg_postLayoutColumns']; // Default value
        $rows = $this->attr['pg_numberOfRow']; // Default value

        // Adjust columns and rows based on device type
        if ($this->device_type === 'Desktop') {
            $columns = isset($this->attr['pg_postLayoutColumns']) ? $this->attr['pg_postLayoutColumns'] : $columns;
            $rows = isset($this->attr['pg_numberOfRow']) ? $this->attr['pg_numberOfRow'] : $rows;
        } else if ($this->device_type === 'Tablet') {
            $columns = isset($this->attr['pg_postLayoutColumnsTablet']) ? $this->attr['pg_postLayoutColumnsTablet'] : 2;
            $rows = isset($this->attr['pg_numberOfRowTablet']) ? $this->attr['pg_numberOfRowTablet'] : $rows;
        } else if ($this->device_type === 'Mobile') {
            $columns = isset($this->attr['pg_postLayoutColumnsMobile']) ? $this->attr['pg_postLayoutColumnsMobile'] : 1;
            $rows = isset($this->attr['pg_numberOfRowMobile']) ? $this->attr['pg_numberOfRowMobile'] : $rows;
        }

        // Default sorting
        $sortByOrder = !empty($this->attr['sortByOrder']) ? $this->attr['sortByOrder'] : 'DESC'; // Default to descending
        $sortByField = !empty($this->attr['sortByField']) ? $this->attr['sortByField'] : 'date'; // Default to 'date'
        if ($sortByField === 'id' || $sortByField === 'Id') {
            $sortByField = strtoupper($sortByField);
        }

        // Convert selected category names array to a comma-separated string
        $selectedCategoryNames = '';
        if (!empty($this->attr['selectedCategories']) && is_array($this->attr['selectedCategories'])) {
            $selectedCategoryNames = implode(',', array_map('sanitize_text_field', $this->attr['selectedCategories']));
        }

        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        // Initial query arguments including category IDs if available
        $args = array(
            'post_type' => 'post',
            'orderby' => $sortByField, // Sorting field
            'order' => strtoupper($sortByOrder), // Sorting order
            'category_name' => $selectedCategoryNames,
            'posts_per_page' => $columns * $rows,
            'paged' => $paged
        );

        // If filtering by featured image is enabled
        if (!empty($this->attr['pg_featuredImageOnly']) && $this->attr['pg_featuredImageOnly']) {
            $args['meta_query'] = array(
                array(
                    'key' => '_thumbnail_id',
                    'compare' => 'EXISTS'
                )
            );
        }

        $query = new WP_Query($args);

        $animated = isset($attr['className']) ? $attr['className'] : '';
        $className = $this->attr['classNamemain'];


        // Rendering posts
        $output = '';
        if ($query->have_posts()) {
            $output .= '<div class="' . esc_attr($className) . ' ' . $animated . ' th-post-grid-main-wp-editor-wrapper">';
            $output .= '<div>';
            $output .= '<div class="th-post-grid-wrapper th-post-grid-wrapper-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">';
            
            while ($query->have_posts()) {
                $query->the_post();
        
                $categories = get_the_category();
                $category_links = array();
                if (!empty($categories)) {
                    foreach ($categories as $category) {
                        $category_links[] = array(
                            'name' => $category->name,
                            'link' => get_category_link($category->term_id)
                        );
                    }
                }
        
                $tags = get_the_tags();
                $tag_links = array();
                if (!empty($tags)) {
                    foreach ($tags as $tag) {
                        $tag_links[] = array(
                            'name' => $tag->name,
                            'link' => get_tag_link($tag->term_id)
                        );
                    }
                }
        
                $output .= '<div class="th-post-grid-inline th-post-grid-inline-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">';
                $output .= $this->render_featured_image();
                $output .= $this->render_category($category_links);
                $output .= $this->render_title();
                $output .= $this->render_author_and_date();
                $output .= $this->render_excerpt();
                $output .= $this->render_full_content();
                $output .= $this->render_tags($tag_links);
                $output .= '</div>';
            }

            $output .= '</div>';

            if ($this->attr['showpagination']) {
                $output .= '<div class="pagination">' . $this->render_pagination($query, $paged) . '</div>'; // Render pagination controls
            }
            
            $output .= '</div>';
            $output .= '</div>';
         
        } else {
            $output .= '<p>' . esc_html__('No posts found.', 'plugin-textdomain') . '</p>';
        }
        wp_reset_postdata();
        return $output;
    }

    //pagination
    public function render_pagination($query,$paged) {
        // Retrieve the current page number from the query var
        $paged = get_query_var('paged') ? get_query_var('paged') : 1;
        // Return early if pagination should not be shown
        if (!isset($this->attr['showpagination']) || !$this->attr['showpagination']) {
            return ''; // Return an empty string if pagination should not be shown
        }
    
        // Pagination settings
        $pagination_args = array(
            'total'         => $query->max_num_pages,
            'current'       => max(1, $paged),
            'prev_next'     => true,
            'prev_text'     => '<span class="page-numbers page-numbers-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">&laquo;</span>',
            'next_text'     => '<span class="page-numbers page-numbers-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">&raquo;</span>',
            'end_size'      => 2,  // Number of page numbers to show at the beginning and end
            'mid_size'      => 2,  // Number of page numbers to show around the current page
            'type'          => 'plain',
            'before_page_number' => '<span class="page-numbers page-numbers-' . esc_attr($this->attr['pg_posts'][0]['uniqueID']) . '">',
            'after_page_number'  => '</span>',
            'add_args'      => false, // Don't add extra args to the pagination URLs
        );
        // Generate and return pagination
        return paginate_links($pagination_args);
    } 

    //featured image
    private function render_featured_image() {
        $output = '';
        $post_id = get_the_ID();
        if ($this->device_type  === 'Desktop') {
            $FeaturedImage = isset($this->attr['pg_showFeaturedImage']) ? $this->attr['pg_showFeaturedImage'] : true;
        } else if ($this->device_type  === 'Tablet') {
           $FeaturedImage = isset($this->attr['pg_showFeaturedImageTablet']) ? $this->attr['pg_showFeaturedImageTablet'] : true;
        } else if ($this->device_type  === 'Mobile') {
           $FeaturedImage = isset($this->attr['pg_showFeaturedImageMobile']) ? $this->attr['pg_showFeaturedImageMobile'] : true;
        }

        if ($FeaturedImage) {
            $featured_image_url = get_the_post_thumbnail_url($post_id, 'full');
            $featured_image_id = get_post_thumbnail_id($post_id); // Get the ID of the featured image

            // Get the alt text for the featured image
            $alt_text = get_post_meta($featured_image_id, '_wp_attachment_image_alt', true);

            // Assuming the attributes are passed as an array to the function or class
            $pg_featuredimage_animate = isset($this->attr['pg_featuredimage_animate']) ? $this->attr['pg_featuredimage_animate'] : false;
            // Check if the animation should be applied
            $animate_class = $pg_featuredimage_animate ? 'animatefeaturedimage-front' : '';

            $output .= '<div class="post-grid-featured-image">
                    <img src="' . esc_url($featured_image_url) . '" class="post-grid-image ' . esc_attr($animate_class) . ' alt="' . esc_attr($alt_text) . '">
                  </div>';

        }
        return $output;
    }

    //category
    private function render_category($categories) {
        $output='';
        if ($this->device_type  === 'Desktop') {
            $showCategories = isset($this->attr['pg_showCategories']) ? $this->attr['pg_showCategories'] : true;
        } else if ($this->device_type  === 'Tablet') {
            $showCategories = isset($this->attr['pg_showCategoriesTablet']) ? $this->attr['pg_showCategoriesTablet'] : true;
        } else if ($this->device_type  === 'Mobile') {
            $showCategories = isset($this->attr['pg_showCategoriesMobile']) ? $this->attr['pg_showCategoriesMobile'] : true;
        }
    
        // Check pg_numberOfCategories attribute to limit displayed categories
        $numberOfCategories = isset($this->attr['pg_numberOfCategories']) ? intval($this->attr['pg_numberOfCategories']) : 1;
    
        if ($showCategories) {
            $output .= '<div class="post-grid-category-style-container">';
            foreach (array_slice($categories, 0, $numberOfCategories) as $category) {
                // Expect $category to be an associative array with 'name' and 'link'
                $output .= '<a href="' . esc_url($category['link']) . '" class="post-grid-category-style-new">' . esc_html($category['name']) . '</a>';
            }
            $output .= '</div>';
        }
        return $output;
    }
    
    //title
    private function render_title() {
        $output = '';

        $post_title = get_the_title();
        $post_permalink = get_permalink();

        $output .= '<div class="vayu_blocks_title_post_grid">';
        
        
        if (isset($this->attr['pg_blockTitleTag'])) {
            $output .= '<' . esc_attr($this->attr['pg_blockTitleTag']) . '>';
        } else {
            $output .= '<h4>';
        }
        $output .= '<a href="' . esc_url($post_permalink) . '"style="text-decoration: none;">';
        $output .= esc_html($post_title);
        $output .= '</a>';
        if (isset($this->attr['pg_blockTitleTag'])) {
            $output .= '</' . esc_attr($this->attr['pg_blockTitleTag']) . '>';
        } else {
            $output .= '</h4>';
        }
    
        $output .= '</div>';

        return $output;
    }
    
    //author and date
    private function render_author_and_date() {
        $output = '';
        $post_date = get_the_date();
        $post_author_id = get_the_author_meta('ID');
        $post_author_name = get_the_author();
        $showAuthor = true; // Default value for showing author
    
        if ($this->device_type  === 'Desktop') {
            $showAuthor = isset($this->attr['pg_showAuthor']) ? $this->attr['pg_showAuthor'] : $showAuthor;
        } else if ($this->device_type  === 'Tablet') {
            $showAuthor = isset($this->attr['pg_showAuthorTablet']) ? $this->attr['pg_showAuthorTablet'] : $showAuthor;
        } else if ($this->device_type  === 'Mobile') {
            $showAuthor = isset($this->attr['pg_showAuthorMobile']) ? $this->attr['pg_showAuthorMobile'] : $showAuthor;
        }
    
        $showDate = true; // Default value for showing date
    
        if ($this->device_type  === 'Desktop') {
            $showDate = isset($this->attr['pg_showDate']) ? $this->attr['pg_showDate'] : $showDate;
        } else if ($this->device_type  === 'Tablet') {
           $showDate = isset($this->attr['pg_showDateTablet']) ? $this->attr['pg_showDateTablet'] : $showDate;
        } else if ($this->device_type  === 'Mobile') {
           $showDate = isset($this->attr['pg_showDateMobile']) ? $this->attr['pg_showDateMobile'] : $showDate;
        }
    
        if ($showAuthor || $showDate) {
            $output .= '<div class="post-grid-author-date-container">';
    
            if ($showAuthor) {
                $output .= '<div class="datecontainer">';
                $output .= '<img src="https://cdn-icons-png.flaticon.com/512/1144/1144760.png" alt="Author Logo" class="post-grid-author-image">';
                $output .= '<a class="post-grid-author-span" href="' . esc_url(get_author_posts_url($post_author_id)) . '">';
                $output .= esc_html($post_author_name);
                $output .= '</a>';
                $output .= '</div>';
            }
    
            if ($showDate) {
                $output .= '<div class="datecontainer">';
                $output .= '<img src="https://cdn-icons-png.flaticon.com/512/2782/2782901.png" alt="Date Image" class="post-grid-date-image">';
                $output .= '<span class="post-grid-date-span">' . esc_html($post_date) . '</span>';
                $output .= '</div>';
            }
    
            $output .= '</div>';
        }

        return $output;
    }
    
    //excerpt content
    private function render_excerpt() {
        $output = '';
        $post_permalink = get_permalink();
        if ($this->device_type  === 'Desktop') {
            $excerpt = isset($this->attr['pg_showExcerpt']) ? $this->attr['pg_showExcerpt'] : false;
            $excerpt_length = isset($this->attr['pg_excerptWords']) ? $this->attr['pg_excerptWords'] : $excerpt_length;
            $excerpt_selector = isset($this->attr['pg_excerptSelector']) ? $this->attr['pg_excerptSelector'] : $excerpt_selector;
        } else if ($this->device_type  === 'Tablet') {
            $excerpt = isset($this->attr['pg_showExcerptTablet']) ? $this->attr['pg_showExcerptTablet'] : false;
            $excerpt_length = isset($this->attr['pg_excerptWordsTablet']) ? $this->attr['pg_excerptWordsTablet'] : $excerpt_length;
            $excerpt_selector = isset($this->attr['pg_excerptSelectorTablet']) ? $this->attr['pg_excerptSelectorTablet'] : $excerpt_selector;
        } else if ($this->device_type  === 'Mobile') {
            $excerpt = isset($this->attr['pg_showExcerptMobile']) ? $this->attr['pg_showExcerptMobile'] : false;
            $excerpt_length = isset($this->attr['pg_excerptWordsMobile']) ? $this->attr['pg_excerptWordsMobile'] : $excerpt_length;
            $excerpt_selector = isset($this->attr['pg_excerptSelectorMobile']) ? $this->attr['pg_excerptSelectorMobile'] : $excerpt_selector;
        }
       
        if ($excerpt) {
            $excerpt_text = wp_trim_words(get_the_excerpt(), $excerpt_length, '');
            $linked_excerpt_selector = '<a class="excerpt_selector" href="' . esc_url($post_permalink) . '">' . $excerpt_selector . '</a>';
            $output .= '<div class="post-grid-excerpt-view">' . $excerpt_text .' '. $linked_excerpt_selector . '</div>';
        }

        return $output;
        
    }
    
    //full content
    private function render_full_content() { 
        $output ='';
        if ($this->device_type  === 'Desktop') {
            $FullContent = isset($this->attr['pg_showFullContent']) ? $this->attr['pg_showFullContent'] : false;
        } else if ($this->device_type  === 'Tablet') {
           $FullContent = isset($this->attr['pg_showFullContentTablet']) ? $this->attr['pg_showFullContentTablet'] : false;
        } else if ($this->device_type  === 'Mobile') {
           $FullContent = isset($this->attr['pg_showFullContentMobile']) ? $this->attr['pg_showFullContentMobile'] : false;
        }

        if ($FullContent) {
            // Get the content and strip HTML tags
            $content = get_the_content();
            $stripped_content = wp_strip_all_tags($content);
    
            // Wrap the stripped content in <p> tags
            $wrapped_content = '<p class="post-grid-excerpt-view">' . $stripped_content . '</p>';
    
            // Output the wrapped content
            $output .= $wrapped_content;
        }
        return $output;
    }
    
    //tags
    private function render_tags($tags) {
        $output ='';
        if ($this->device_type  === 'Desktop') {
            $showTags = isset($this->attr['pg_showTags']) ? $this->attr['pg_showTags'] : false;
        } else if ($this->device_type  === 'Tablet') {
            $showTags = isset($this->attr['pg_showTagTablet']) ? $this->attr['pg_showTagTablet'] : false;
        } else if ($this->device_type  === 'Mobile') {
            $showTags = isset($this->attr['pg_showTagMobile']) ? $this->attr['pg_showTagMobile'] : false;
        }
    
        $numberOfTags = isset($this->attr['pg_numberOfTags']) ? intval($this->attr['pg_numberOfTags']) : 1;
    
        if ($showTags) {
            $output .= '<div class="post-grid-tag-style-conatiner">';
            foreach (array_slice($tags, 0, $numberOfTags) as $tag) {
                $output .= '<a href="' . esc_url($tag['link']) . '" class="post-grid-tag-style-new">' . esc_html($tag['name']) . '</a>';
            }
            $output .= '</div>';
        }
        return $output;
    }
    
    //device type
    private function get_device_type() {
        $tablet_browser = 0;
        $mobile_browser = 0;
        
        if (preg_match('/(tablet|ipad|playbook)|(android(?!.*(mobi|opera mini)))/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $tablet_browser++;
        }
        
        if (preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iemobile)/i', strtolower($_SERVER['HTTP_USER_AGENT']))) {
            $mobile_browser++;
        }
        
        if ((strpos(strtolower($_SERVER['HTTP_ACCEPT']),'application/vnd.wap.xhtml+xml') > 0) or ((isset($_SERVER['HTTP_X_WAP_PROFILE']) or isset($_SERVER['HTTP_PROFILE'])))) {
            $mobile_browser++;
        }
        
        $mobile_ua = strtolower(substr($_SERVER['HTTP_USER_AGENT'], 0, 4));
        $mobile_agents = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-');
        
        if (in_array($mobile_ua,$mobile_agents)) {
            $mobile_browser++;
        }
        
        if (strpos(strtolower($_SERVER['HTTP_USER_AGENT']),'opera mini') > 0) {
            $mobile_browser++;
            // Check for tablets on opera mini alternative headers
            $stock_ua = strtolower(isset($_SERVER['HTTP_X_OPERAMINI_PHONE_UA']) ? $_SERVER['HTTP_X_OPERAMINI_PHONE_UA'] : (isset($_SERVER['HTTP_DEVICE_STOCK_UA']) ? $_SERVER['HTTP_DEVICE_STOCK_UA'] : ''));
            if (preg_match('/(tablet|ipad|playbook)|(android(?!.*mobile))/i', $stock_ua)) {
                $tablet_browser++;
            }
        }
        
        if ($tablet_browser > 0) {
            return 'Tablet';
        } else if ($mobile_browser > 0) {
            return 'Mobile';
        } else {
            return 'Desktop';
        }
    }
    
}

function post_grid_render($attr) {
    $default_attributes = include('defaultattributes.php'); //attributes Merged
    $attr = array_merge($default_attributes, $attr); 
    $renderer = new VayuBlocksPostGrid($attr);
    $style = "<style id='post-grid-style'>";
        $style .= generate_inline_styles($attr);
    $style .= "</style>";
    return $renderer->render_posts().$style;
}