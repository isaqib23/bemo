const apiUrl = bemo.apiUrl;
const siteUrl = bemo.siteUrl;

export const settings = {
    appName: bemo.appName,
    appURL: bemo.siteUrl
}

class URL {
    constructor(base,appURL) {
        this.base = base
    }

    path(path, args) {
        path = path.split('.')
        let obj = this,
            url = this.base

        for (let i = 0; i < path.length && obj; i++) {
            if (obj.url) {
                url += '/' + obj.url
            }

            obj = obj[path[i]]
        }
        if (obj) {
            url = url + '/' + (typeof obj === 'string' ? obj : obj.url)
        }

        if (args) {
            for (let key in args) {
                url = url.replace(':' + key, args[key])
            }
        }

        return url
    }
}

export const api = Object.assign(new URL(apiUrl,siteUrl), {
    columns: {
        url: 'columns',

        all: 'all',
        create: 'create',
        delete: 'delete'
    },

    cards: {
        url: 'cards',

        create: 'create',
        update: 'update'
    },

    database: {
        url: 'database',

        dump: 'dump',
    }
})
