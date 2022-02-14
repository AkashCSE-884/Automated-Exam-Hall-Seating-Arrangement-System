document.getElementById('btnClose').addEventListener('click', (e) => {
    e.stopImmediatePropagation();
    document.getElementById('alertBox').style.display = 'none';
})
