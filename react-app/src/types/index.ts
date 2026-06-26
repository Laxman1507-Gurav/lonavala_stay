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
  weekday_price: number;
  weekend_price: number;
  check_in_time: string;
  check_out_time: string;
  rating: number;
  featured: boolean;
  has_pool: boolean;
  main_image: string;
  images: string[];
  amenities: string[];
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
