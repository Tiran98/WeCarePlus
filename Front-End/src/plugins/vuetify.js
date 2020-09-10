import Vue from 'vue';
import Vuetify from 'vuetify/lib';

import colors from 'vuetify/lib/util/colors'

Vue.use(Vuetify);

export default new Vuetify({
    icons: {
        iconfont: 'mdi',
        values: {
            product: 'mdi-drmopbox',
            support: 'mdi-lifebuoy',
            steam: 'mdi-steam-box',
            pc: 'mdi-desktop-classic',
            xbox: 'mdi-xbox',
            playstation: 'mdi-playstation',
            switch: 'mdi-nintendo-switch',
        }
    },
    theme: {
        themes: {
            light: {
                primary: colors.teal.darken1,
                primarydark: colors.teal.darken4,
                secondary: colors.teal.lighten5,
                secondarydark: colors.teal.lighten2,
                accent: colors.teal.accent2,
            },
        },
    },
});