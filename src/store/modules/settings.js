/**
 * External dependencies.
 */
// import axios from 'axios';

// initial state
const state = () => ({
    settings: null,
    isSaving: false,
});

// getters
const getters = {
    settings: state => state.settings,
    isSaving: state => state.isSaving,
};

// actions
const actions = {
    async storeSettings({ commit }, settings) {
        commit('setSettingsSaving', true);

        // @todo: Test checking with Live URL.
        // await axios.post(`https://example.com`, settings)
        //   .then(res => {
        //     commit('storeSettings', res.data);
        //     commit('setSettingsSaving', false);
        //   }).catch(err => {
        //     console.log('error', err);
        //     commit('setSettingsSaving', false);
        //   });

        commit('storeSettings', settings);
        commit('setSettingsSaving', false);
    },
};

// mutations
const mutations = {
    storeSettings: (state, settings) => {
        state.settings = settings;
    },

    setSettingsSaving: (state, isSaving) => {
        state.isSaving = isSaving;
    },
};

export default {
    state,
    getters,
    actions,
    mutations
};