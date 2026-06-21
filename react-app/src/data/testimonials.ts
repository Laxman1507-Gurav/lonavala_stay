import type { Testimonial } from '../types';

const baseTestimonials: Testimonial[] = [
  {
    name: 'Priya & Raj Mehta',
    rating: 5,
    review: 'Absolutely breathtaking experience at the Khandala Ridge Estate. The infinity pool at sunrise was something we will never forget. The caretaker team was incredibly attentive. Highly recommend!',
  },
  {
    name: 'Arjun Sharma',
    rating: 5,
    review: 'We hosted our company retreat at The Lonavala Grand Villa. Everything was seamless — 20 colleagues, a private chef, bonfire nights. A truly premium and professional villa experience.',
  },
  {
    name: 'Kavya & Nikhil',
    rating: 5,
    review: 'Celebrated our anniversary at the Pawna Lakeside Retreat. The lake view from the pool deck was mesmerizing. The team went above and beyond to make it special. Will definitely return!',
  },
  {
    name: 'Rohan Desai',
    rating: 4,
    review: 'Great villa at Tiger Point Heights! Stunning valley views and a very well maintained property. The concierge team responded instantly to every request. Perfect for a weekend escape.',
  },
];

const FEEDBACK_KEY = 'lonavala_user_feedback';

export function getAllTestimonials(): Testimonial[] {
  try {
    const stored = localStorage.getItem(FEEDBACK_KEY);
    if (stored) {
      const userFeedbacks: Testimonial[] = JSON.parse(stored);
      if (Array.isArray(userFeedbacks)) {
        return [...userFeedbacks, ...baseTestimonials];
      }
    }
  } catch {
    // ignore parse errors
  }
  return baseTestimonials;
}

export function saveUserFeedback(feedback: Testimonial): void {
  try {
    const stored = localStorage.getItem(FEEDBACK_KEY);
    const existing: Testimonial[] = stored ? JSON.parse(stored) : [];
    existing.unshift(feedback);
    localStorage.setItem(FEEDBACK_KEY, JSON.stringify(existing));
  } catch {
    // ignore storage errors
  }
}
