import Info from './components/Main/Info';
import Map from './components/Main/Map';
import Seo from './components/Main/Seo';
import Result from './components/Main/Result';
import Mainc from './components/Main/Mainc';

export default {
    mode: 'hash',

    routes: [
        {
            path: '/',
            components: {
                default: Info,
                a: Map,
                b: Seo
            }
        },
        {
            name: 'res',
            path: '/results/date=:date&start=:start&stop=:stop&tickets=:tickets',
            components: {
                default: Result,
            },
            props: true
        },
    ]
}