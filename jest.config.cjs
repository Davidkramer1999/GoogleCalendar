module.exports = {
    moduleFileExtensions: ["ts"],
    transform: {
        "^.+\\.js$": "babel-jest",
        "^.+\\.vue$": "vue-jest",
    },
    transformIgnorePatterns: ["/node_modules/(?!bootstrap-vue)"],
};
