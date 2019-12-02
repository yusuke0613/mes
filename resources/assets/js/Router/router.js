import Vue from 'vue'
import VueRouter from 'vue-router'
import Login from '../login/Login'
import SignUp from '../login/signup'
import Logout from '../login/Logout'
import DashBordUserControl from '../dashbord/DashBordUserControl'
import DashBordComponentIn from '../dashbord/DashBordComponentIn'
import LineSetting   from '../admin/LineSetting'
import WorkerSetting from '../admin/WorkerSetting'
import ProcessSetting   from '../admin/ProcessSetting'
import HostSetting from '../admin/HostSetting'
import DashBordTagForm from '../dashbord/DashBordTagForm'



Vue.use(VueRouter)

const routes = [
    {path: '/login', component: Login},
    {path: '/signup', component: SignUp},
    {path: '/', component: DashBordComponentIn},
    {path: '/logout', component: Logout},

    {path: '/tag'               , component: DashBordTagForm},
    {path: '/setting'           , component: DashBordUserControl},
    {path: '/linesetting'       , component: LineSetting},
    {path: '/workersetting'     , component: WorkerSetting},
    {path: '/processsetting'    , component: ProcessSetting},
    {path: '/hostsetting'       , component: HostSetting},
    
    
]

const router = new VueRouter({
    routes,
    hashbang : false,
    mode: 'history'
  
})

export default router