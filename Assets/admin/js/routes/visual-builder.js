import {VisualBuilder} from './../components/+visual-builder';

export default [
    {
        name: 'visual_builder.index',
        path: '/visual-builder',
        component: VisualBuilder,
        meta: { requiresAuth: true, permission: 'view_pages', icon: 'pages', menu: true },
        children: [
            {
                name: 'visual_builder.index',
                path: '/visual-builder',
                component: VisualBuilder,
                meta: { requiresAuth: true, permission: 'view_pages', menu: true }
            }
        ]
    }
]