module.exports = {
    "transpileDependencies": [
        "vuetify"
    ],
    "pluginOptions": {
        "moment": {
            "locales": [
                "sri lanka"
            ]
        }
    },
    devServer: {
        proxy: {
            '/api': {
                target: 'http://localhost:8001',
                changeOrigin: true,
                secure: true,
            }
        },
    },
}