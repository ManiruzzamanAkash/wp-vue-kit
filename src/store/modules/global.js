// initial state
const state = () => ({
    alert: {
        isVisible: false,
        message  : '',
        type     : 'default'
    }
});

// getters
const getters = {
    alert : state => state.alert,
};

// actions
const actions = {
    setAlert({ commit }, alert) {
        commit('setAlert', alert);

        // Hide the success alert after 5 seconds.
        if ('success' === alert.type) {
            setTimeout(() => {
                commit('hideAlert');
            }, 5000);
        }
    },

    showAlert({ commit }) {
        commit('setIsAlertVisible', true);
    },

    hideAlert({ commit }) {
        commit('hideAlert', false);
    },
};

// mutations
const mutations = {
    setAlert: (state, alert) => {
        state.alert = {
            ...state.alert,
            isVisible: true,
            ...alert
        };
    },

    hideAlert: (state) => {
        state.alert = {
            isVisible: false,
            message  : '',
            type     : 'default'
        };
    },

    setIsAlertVisible: (state, isVisible) => {
        state.alert = {
            ...state.alert,
            isVisible
        };
    },
};

export default {
    state,
    getters,
    actions,
    mutations
};
