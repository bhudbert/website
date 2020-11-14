 /*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import '../css/app.scss';

 import Vue from 'vue';



 import OtherApplication from './components/other-application/bootComponent';
 import ContentManager from './components/content-manager/bootComponent';

 const otherApplication = new Vue({
     el: '#other-application',
     render: h => h(OtherApplication),
 });

 const contentManager = new Vue({
     el: '#content-manager',
     render: h => h(ContentManager),
 });
