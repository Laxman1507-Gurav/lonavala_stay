import type { Offer } from '../types';

export const allOffers: Offer[] = [
  {
    id: 1,
    title: 'Early Bird Escape',
    discount: '15% OFF',
    description: 'Plan your luxury getaway in advance and save big. Book at least 30 days ahead and enjoy a 15% discount on any villa of your choice across Lonavala and Khandala.',
    expiry_date: '2026-12-31',
    image_path: '/bird.jpg',
  },
  {
    id: 2,
    title: 'Weekend Getaway Deal',
    discount: '10% OFF',
    description: 'Escape the city every weekend. Special pricing for Friday to Sunday stays on selected premium villas, including complimentary breakfast and caretaker service.',
    expiry_date: '2026-12-31',
    image_path: '/weekend.jpg',
  },
  {
    id: 3,
    title: 'New Year\'s Eve Grandeur',
    discount: '25% OFF',
    description: 'Ring in the New Year in absolute luxury. Enjoy 25% off on any villa for the 31st December night. Package includes premium amenities: complimentary private DJ setup, countdown bonfire, live barbecue station, customized midnight gala dinner, and premium party decorations.',
    expiry_date: '2026-12-31',
    image_path: '/31st.jpg',
  },
];
