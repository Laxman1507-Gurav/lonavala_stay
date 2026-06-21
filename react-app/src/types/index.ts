export interface Villa {
  id: number;
  name: string;
  capacity: string;
  location: string;
  villa_type: string;
  description: string;
  bedrooms: number;
  bathrooms: number;
  guests: number;
  parking: number;
  pool_size: string;
  price_per_night: number;
  rating: number;
  featured: boolean;
  has_pool: boolean;
  main_image: string;
  images: string[];
  amenities: string[];
}

export interface Offer {
  id: number;
  title: string;
  discount: string;
  description: string;
  expiry_date: string;
  image_path: string;
}

export interface Testimonial {
  name: string;
  rating: number;
  review: string;
}

export interface SiteSettings {
  phone: string;
  whatsapp: string;
  email: string;
  address: string;
  facebook?: string;
  instagram: string;
  youtube?: string;
}
