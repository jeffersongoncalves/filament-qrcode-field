let html5QrcodeScanner;
let isScanning = false;

function openScannerModal() {
    window.dispatchEvent(new CustomEvent('open-modal', { detail: { id: 'qrcode-scanner-modal' } }));
}

function closeScannerModal() {
    window.dispatchEvent(new CustomEvent('close-modal', { detail: { id: 'qrcode-scanner-modal' } }));
    stopScanning();
}

function stopScanning() {
    isScanning = false;
    html5QrcodeScanner.pause();
    html5QrcodeScanner.clear();
}

function onScanSuccess(decodedText, decodedResult) {
    window.dispatchEvent(new CustomEvent('qrcode-scan', { detail: { qrcode: decodedText } }));
    closeScannerModal();
}

function startCamera() {
    html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
    html5QrcodeScanner.render(onScanSuccess);
}

window.addEventListener('open-modal', event => {
    if (event.detail.id === 'qrcode-scanner-modal') {
        startCamera();
    }
});

window.addEventListener('close-modal', event => {
    if (event.detail.id === 'qrcode-scanner-modal') {
        stopScanning();
    }
});
