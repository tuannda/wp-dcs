import init from './libs/modules'

import '../css/main.css'

document.addEventListener('DOMContentLoaded', () => {
    init({
        module: 'modules'
    }).mount()
})
