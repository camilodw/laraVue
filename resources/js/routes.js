import Home from './views/Home.vue';
//imporrtamos los componentes de game
import EditGame from './views/game/EditGame.vue';
import CreateGame from './views/game/CreateGame.vue';
export const routes = [{
        path: '/',
        component: Home,
        name: "Home"
    },
    {
        name: 'EditGame',
        path: '/edit/:id',
        component: EditGame
    },
    {
        name: 'CreateGame',
        path: '/create',
        component: CreateGame
    }
];