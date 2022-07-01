export default () => {

    const dropDownEls = document.querySelectorAll('[data-drop-down]');
    if (!dropDownEls && dropDownEls.length === 0) return;

    dropDownEls.forEach((item) => {
        initDropDown(item)
    });

    function initDropDown(item) {
        const trigger = item.querySelector('[data-drop-down-trigger]');
        if (!trigger) return;
        trigger.addEventListener('click', () => {
            item.classList.toggle('active');
        });
    }
}