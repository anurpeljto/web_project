(()=>{"use strict";var n,e,t,r,o,i,a,s,d,l,c,p,f,u,m={28:(n,e,t)=>{t.d(e,{Z:()=>s});var r=t(81),o=t.n(r),i=t(645),a=t.n(i)()(o());a.push([n.id,"* {\n    font-family: 'Roboto', 'Helvetica', sans-serif;\n}\na {\n    text-decoration: none;\n    color: black;\n}\n\nbody{\n    display: grid;\n    position: absolute;\n    height: 100%;\n    width: 100%;\n    grid-template-columns: 0.25fr 1fr;\n    padding: 0;\n    margin: 0;\n    overflow: hidden;\n}\n\nspan {\n    font-family: 'Roboto', 'Helvetica', sans-serif;\n}\n\n.sidebar {\n    height: 100%;\n    position: relative;\n    display: grid;\n    grid-template-columns: 1fr;\n    grid-template-rows: 0.2fr .4fr .2fr .2fr;\n    gap: 0.5rem;\n    padding: 0;\n    margin: 0;\n    background-color: rgb(77 232 167);\n    padding-left: 10px;\n}\n\n.sidebar-item {\n    display: grid;\n    grid-template-columns: 0.2fr 1fr;\n    gap: 5px;\n    justify-items: start;\n    align-items: center;\n    font-size: 20px;\n    font-family: 'Roboto', 'Helvetica', sans-serif;\n    font-weight: lighter;\n}\n\n#taskBox{\n    grid-template-rows: repeat(6, 1fr);\n    gap: 10px;\n}\n#projectBox{\n    grid-template-rows: repeat(4, 1fr);\n    gap: 10px;\n}\n\n.sidebar-item > span:hover {\n    transition: width 1s ease;\n    text-decoration: underline;\n    position: relative;\n    text-decoration-color: orange;\n    width: 100%;\n}\n\n.mainlayout{\n    position: relative;\n    padding: 0;\n    margin: 0;\n    display: grid;\n    grid-template-rows: repeat(auto-fit, minmax(0, 0.20fr));\n    grid-template-columns: repeat(auto-fit, 1fr);\n    overflow: scroll;\n}\n\n.content {\n    height: 100%;\n    width: 100%;\n    padding: 4em;\n    display: grid;\n    grid-template-columns: 1fr;\n    grid-template-rows: 0.2fr minmax(auto, 1fr);\n    gap: 2em;\n}\n\n.firstbox{\n    display: grid;\n    grid-template-columns: 1fr .2fr;\n    grid-auto-flow: row;\n    gap: 1em;\n}\n\n.tasks {\n    grid-column: 1;\n    display: flex;\n    gap: 1em;\n    justify-content: space-between;\n    align-items: center;\n    border: 2px solid whitesmoke;\n    border-radius: 10px;\n    border-spacing: 10px;\n}\n\n.timeAndCategory{\n    display: flex;\n    flex-direction: column;\n    justify-content: flex-end;\n    align-items: flex-end;\n}\n\n.family {\n    color: pink;\n}\n.carreer {\n    color: #E80041;\n}\n.hydration{\n    color: #00B5E8;\n}\n.mindfulness {\n    color:#00E833;\n}\n\n.food{\n    color: #E8A700;\n}\n\n.secondbox{\n    display: grid;\n    grid-template-columns: 1fr .2fr;\n    grid-auto-flow: row;\n    gap: 1em;\n}\n\n.settingsContainer {\n    height: 100%;\n    width: 100%;\n    background-color: white;\n    grid-row: 1 / -1;\n    grid-column: 1 / -1;\n    \n}\n\n.settingslayout {\n    height: 100%;\n    width: 100%;\n    margin: 3rem;\n    grid-row: 1 / -1;\n    grid-column: 1 / -1;\n    display: grid;\n    grid-template-columns: 1fr 1fr;\n    grid-template-rows: 0.2fr 1fr;\n    grid-auto-flow: column;\n    gap: 2em;\n}\n\n.settingsTitles{\n    display: grid;\n    grid-template-columns: 1fr;\n    grid-template-rows: 0.1fr 0.1fr;\n    grid-auto-flow: row;\n    gap: 2em;\n}\n\n.settingsBox{\n    grid-column: 1 / 3;\n    grid-row: 2;\n    display: grid;\n    grid-template-columns: repeat(2, .25fr);\n    grid-template-rows: repeat(4, .25fr);\n}\n\n.setting {\n    font-size: 1em;\n    font-weight: lighter+100;\n}\n\n.saveSettings {\n    grid-row: -1;\n    height: 3em;\n    width: 8rem;\n}\n\n.tinyLine{\n    height: 1px;\n    width: 100%;\n    color: black;\n}",""]);const s=a},645:n=>{n.exports=function(n){var e=[];return e.toString=function(){return this.map((function(e){var t="",r=void 0!==e[5];return e[4]&&(t+="@supports (".concat(e[4],") {")),e[2]&&(t+="@media ".concat(e[2]," {")),r&&(t+="@layer".concat(e[5].length>0?" ".concat(e[5]):""," {")),t+=n(e),r&&(t+="}"),e[2]&&(t+="}"),e[4]&&(t+="}"),t})).join("")},e.i=function(n,t,r,o,i){"string"==typeof n&&(n=[[null,n,void 0]]);var a={};if(r)for(var s=0;s<this.length;s++){var d=this[s][0];null!=d&&(a[d]=!0)}for(var l=0;l<n.length;l++){var c=[].concat(n[l]);r&&a[c[0]]||(void 0!==i&&(void 0===c[5]||(c[1]="@layer".concat(c[5].length>0?" ".concat(c[5]):""," {").concat(c[1],"}")),c[5]=i),t&&(c[2]?(c[1]="@media ".concat(c[2]," {").concat(c[1],"}"),c[2]=t):c[2]=t),o&&(c[4]?(c[1]="@supports (".concat(c[4],") {").concat(c[1],"}"),c[4]=o):c[4]="".concat(o)),e.push(c))}},e}},81:n=>{n.exports=function(n){return n[1]}},379:n=>{var e=[];function t(n){for(var t=-1,r=0;r<e.length;r++)if(e[r].identifier===n){t=r;break}return t}function r(n,r){for(var i={},a=[],s=0;s<n.length;s++){var d=n[s],l=r.base?d[0]+r.base:d[0],c=i[l]||0,p="".concat(l," ").concat(c);i[l]=c+1;var f=t(p),u={css:d[1],media:d[2],sourceMap:d[3],supports:d[4],layer:d[5]};if(-1!==f)e[f].references++,e[f].updater(u);else{var m=o(u,r);r.byIndex=s,e.splice(s,0,{identifier:p,updater:m,references:1})}a.push(p)}return a}function o(n,e){var t=e.domAPI(e);return t.update(n),function(e){if(e){if(e.css===n.css&&e.media===n.media&&e.sourceMap===n.sourceMap&&e.supports===n.supports&&e.layer===n.layer)return;t.update(n=e)}else t.remove()}}n.exports=function(n,o){var i=r(n=n||[],o=o||{});return function(n){n=n||[];for(var a=0;a<i.length;a++){var s=t(i[a]);e[s].references--}for(var d=r(n,o),l=0;l<i.length;l++){var c=t(i[l]);0===e[c].references&&(e[c].updater(),e.splice(c,1))}i=d}}},569:n=>{var e={};n.exports=function(n,t){var r=function(n){if(void 0===e[n]){var t=document.querySelector(n);if(window.HTMLIFrameElement&&t instanceof window.HTMLIFrameElement)try{t=t.contentDocument.head}catch(n){t=null}e[n]=t}return e[n]}(n);if(!r)throw new Error("Couldn't find a style target. This probably means that the value for the 'insert' parameter is invalid.");r.appendChild(t)}},216:n=>{n.exports=function(n){var e=document.createElement("style");return n.setAttributes(e,n.attributes),n.insert(e,n.options),e}},565:(n,e,t)=>{n.exports=function(n){var e=t.nc;e&&n.setAttribute("nonce",e)}},795:n=>{n.exports=function(n){if("undefined"==typeof document)return{update:function(){},remove:function(){}};var e=n.insertStyleElement(n);return{update:function(t){!function(n,e,t){var r="";t.supports&&(r+="@supports (".concat(t.supports,") {")),t.media&&(r+="@media ".concat(t.media," {"));var o=void 0!==t.layer;o&&(r+="@layer".concat(t.layer.length>0?" ".concat(t.layer):""," {")),r+=t.css,o&&(r+="}"),t.media&&(r+="}"),t.supports&&(r+="}");var i=t.sourceMap;i&&"undefined"!=typeof btoa&&(r+="\n/*# sourceMappingURL=data:application/json;base64,".concat(btoa(unescape(encodeURIComponent(JSON.stringify(i))))," */")),e.styleTagTransform(r,n,e.options)}(e,n,t)},remove:function(){!function(n){if(null===n.parentNode)return!1;n.parentNode.removeChild(n)}(e)}}}},589:n=>{n.exports=function(n,e){if(e.styleSheet)e.styleSheet.cssText=n;else{for(;e.firstChild;)e.removeChild(e.firstChild);e.appendChild(document.createTextNode(n))}}}},g={};function h(n){var e=g[n];if(void 0!==e)return e.exports;var t=g[n]={id:n,exports:{}};return m[n](t,t.exports,h),t.exports}h.n=n=>{var e=n&&n.__esModule?()=>n.default:()=>n;return h.d(e,{a:e}),e},h.d=(n,e)=>{for(var t in e)h.o(e,t)&&!h.o(n,t)&&Object.defineProperty(n,t,{enumerable:!0,get:e[t]})},h.o=(n,e)=>Object.prototype.hasOwnProperty.call(n,e),h.nc=void 0,n=h(379),e=h.n(n),t=h(795),r=h.n(t),o=h(569),i=h.n(o),a=h(565),s=h.n(a),d=h(216),l=h.n(d),c=h(589),p=h.n(c),f=h(28),(u={}).styleTagTransform=p(),u.setAttributes=s(),u.insert=i().bind(null,"head"),u.domAPI=r(),u.insertStyleElement=l(),e()(f.Z,u),f.Z&&f.Z.locals&&f.Z.locals})();