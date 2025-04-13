export function formatPriceDollar(price) {
    const numericPrice = parseFloat(price); // Konwersja na liczbę
    if (isNaN(numericPrice)) {
        return "$0.00"; // Domyślna wartość, jeśli price nie jest liczbą
    }
    return `$${numericPrice.toFixed(2)}`; // Formatowanie do dwóch miejsc po przecinku
}
