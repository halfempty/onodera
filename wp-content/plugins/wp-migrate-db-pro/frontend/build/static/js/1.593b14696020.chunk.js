(this.webpackJSONPwpmdb=this.webpackJSONPwpmdb||[]).push([[1],{671:function(e,t,n){"use strict";var a=n(0),r=n.n(a),l=n(6),i=n(1),c=n(11),s=n.n(c);t.a=function(e){var t="exclude-files-".concat(e.type);return r.a.createElement(r.a.Fragment,null,r.a.createElement("h4",{className:"exclude-files-title",id:t},s()(Object(i.c)(Object(i.a)('Excluded Files<span class="screen-reader-text"> %s</span>',"wp-migrate-db"),e.type))),r.a.createElement(function(e){var t=e.type,n=Object(l.e)(function(e){return e.migrations}),a=n.current_migration,c=n.local_site,u=n.remote_site;return r.a.createElement("p",null,s()(Object(i.c)(Object(i.a)('Use <a href="%s" target="_blank" rel="noopener noreferrer">gitignore patterns</a> to exclude files relative to <code>%s</code>',"wp-migrate-db"),"https://deliciousbrains.com/wp-migrate-db-pro/doc/ignored-files/",function(){var e,n,r,l,i,s="pull"===a.intent,p=s?u:c,o=p.site_details,d=o.themes_path,m=o.plugins_path,g=o.muplugins_path,h=o.content_dir,b=s?p.path:p.this_path,w=function(e,t){return void 0===e?null:e.replace(t,"").replace(/^\/|\/$/g,"")};switch(t){case"themes":return null!==(e=w(d,b))&&void 0!==e?e:"wp-content/themes";case"plugins":return null!==(n=w(m,b))&&void 0!==n?n:"wp-content/plugins";case"muplugins":return null!==(r=w(g,b))&&void 0!==r?r:"wp-content/mu-plugins";case"media":return null!==(l=w(s?p.wp_upload_dir:p.this_wp_upload_dir,b))&&void 0!==l?l:"wp-content/uploads";case"others":return null!==(i=w(h,b))&&void 0!==i?i:"wp-content";default:return""}}())))},{type:e.type}),r.a.createElement("textarea",{onChange:function(t){e.excludesUpdater(t.target.value,e.type)},value:e.excludes||"","aria-labelledby":t}))}}}]);