(()=>{"use strict";const t={none:void 0,"o-typing-slower":.4,"o-typing-slow":.25,"o-typing-fast":.05,"o-typing-faster":.01};var e;e=()=>{const e={root:null,rootMargin:"0px",threshold:[.6]};let n="\n\t\t.o-anim-typing-caret::after {\n\t\t\tfont-weight: 100;\n\t\t\tcontent: '|';\n\t\t\tcolor: #2E3D48;\n\t\t\tanimation: 1s blink step-end infinite;\n\t\t}\n\t\n\t\t@keyframes blink {\n\t\t\tfrom, to {\n\t\t\t  color: transparent;\n\t\t   }\n\t\t\t50% {\n\t\t\t  color: black;\n\t\t   }\n\t\t}\n\t";n=n.replace(/(\r\n|\n|\r|\t)/gm,"");let r=!1;setTimeout((()=>{document.querySelectorAll("o-anim-typing").forEach((s=>{if(!r){const t=document.createElement("style");t.innerText=n,document.head.appendChild(t),r=!0}const i=(e=>{const n=e?.innerHTML||"",r=(e=>{let n=e.parentElement;for(let e=0;e<3;++e)if(Array.from(n.classList).some((t=>t.includes("o-typing-")))){const e=Array.from(n.classList),r=e.filter((t=>t.includes("o-typing-delay-"))).pop(),s=parseInt(r?.split("-")?.[3]||"0"),i=r?.includes("ms"),o=Object.keys(t),a=e?.filter((t=>o.includes(t)))?.pop()||"fast";return{speed:t[a],delay:s*(i?0:1e3)}}})(e);n?.length||returnl;const s=n.length,i=(r?.speed||.1)*s,{start:o,steps:a,stop:l}=((t,e)=>{let n,r=0;const s=Math.ceil(t/e)+1||1,i=t=>{clearInterval(n),t?.()};return{steps:s,start:(t,o)=>{n=setInterval((()=>{r<s?(t?.(r),r+=1):i(o)}),1e3*e)},stop:i}})(i,r?.speed||.1),c=document.createElement("span");c.classList.add("o-anim-typing-caret"),c.style.whiteSpace="pre-wrap";const p=document.createElement("span");p.style.whiteSpace="pre-wrap",p.style.visibility="hidden";const d=e.innerHTML;return e.innerHTML="",e.appendChild(c),e.appendChild(p),c.innerHTML=n.slice(0,0),p.innerHTML=n.slice(0),()=>{setTimeout((()=>{o((t=>{c.innerHTML=n.slice(0,t),t<s&&(p.innerHTML=n.slice(t)),s>=a&&l()}),(()=>{e.innerHTML=d}))}),r?.delay||0)}})(s),o=new IntersectionObserver((t=>{t.forEach((t=>{t.isIntersecting&&0<t.intersectionRect.height&&(o.unobserve(s),i())}))}),e);o.observe(s)}))}),100)},"undefined"!=typeof document&&("complete"!==document.readyState&&"interactive"!==document.readyState?document.addEventListener("DOMContentLoaded",e):e())})();