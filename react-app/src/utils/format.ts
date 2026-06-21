export function formatPrice(amount: number): string {
  return '₹' + amount.toLocaleString('en-IN');
}

export function formatDate(dateStr: string): string {
  const date = new Date(dateStr);
  return date.toLocaleDateString('en-IN', { day: '2-digit', month: 'short', year: 'numeric' });
}
