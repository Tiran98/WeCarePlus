import Vue from 'vue';
import Vuetify from 'vuetify/lib';

import colors from 'vuetify/lib/util/colors'

Vue.use(Vuetify);

export default new Vuetify({
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