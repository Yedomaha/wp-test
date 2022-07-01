export default () => {

    const tagItems = document.querySelectorAll('.tag-item');
    if (!tagItems && tagItems.length === 0) return;

    tagItems.forEach((item) => {
        initTagItem(item)
    });

    function initTagItem(item) {
        item.addEventListener('click', () => {
            if (window.innerWidth <= 1024) {
                if (item.classList.contains('active')) {
                    item.classList.remove('active');
                } else {
                    closeActive();
                    item.classList.add('active');
                }
            }
        });
    }

    function closeActive() {
        let activeItems = document.querySelectorAll('.tag-item.active');
        if (!activeItems || activeItems.length === 0) return;

        activeItems.forEach((item) => {
            item.classList.remove('active');
        })
    }
}