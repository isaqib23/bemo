import Vue from 'vue'
import VueRouter from 'vue-router'
import routes from './routes'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes
})

const rules = {
    anonymous : { fail: 'login', check: () => {} }
}

function reroute(to) {
    let failRoute = false,
        checkResult = false

    to.meta.rules && to.meta.rules.forEach(rule => {
        let check = false
        if (Array.isArray(rule)) {
            let checks = []
            for (let i in rule) {
                checks[i] = rules[rule[i]].check()
                check = check || checks[i]
            }
            if (!check && !failRoute) {
                failRoute = rules[rule[checks.indexOf(false)]].fail
            }
        }
        else {
            check = rules[rule].check()
            if (!check && !failRoute) {
                failRoute = rules[rule].fail
            }
        }

        checkResult = checkResult && check
    })

    if (!checkResult && failRoute) {
        return { name: failRoute }
    }

    return false
}

export default router
