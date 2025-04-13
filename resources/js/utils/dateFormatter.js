export function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toISOString().slice(0, 16).replace("T", " "); // Format: YYYY-MM-DD HH:mm
}
