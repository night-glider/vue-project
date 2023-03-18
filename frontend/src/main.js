import { createApp } from 'vue'
import App from './App.vue'
import * as VueRouter from 'vue-router';

import CreateResume from './components/CreateResume.vue'
import DragTable from './components/DragTable.vue'
import EditResume from './components/EditResume.vue'

const routes = [
  { path: "/add", component: CreateResume},
  { path: "/", component: DragTable},
  { path: "/edit", component: EditResume},
]

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = VueRouter.createRouter({
  // 4. Provide the history implementation to use. We are using the hash history for simplicity here.
  history: VueRouter.createWebHashHistory(),
  routes, // short for `routes: routes`
})

const app = createApp(App)
app.use(router)
app.mount('#app')
