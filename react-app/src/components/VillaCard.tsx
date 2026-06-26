import { Link } from 'react-router-dom'
import type { Villa } from '../types'
import { formatPrice } from '../utils/format'

interface VillaCardProps {
  villa: Villa
}

export default function VillaCard({ villa }: VillaCardProps) {
  return (
    <div className="bg-white group hover-gold-border flex flex-col justify-between h-full shadow-lg overflow-hidden transition-all duration-500 animate-fadeIn">
      {/* Image */}
      <div className="relative overflow-hidden img-zoom-container h-48 sm:h-56 md:h-60 lg:h-64">
        <img
          src={villa.main_image}
          alt={villa.name}
          className="w-full h-full object-cover"
          onError={(e) => {
            (e.target as HTMLImageElement).src = '/assets/images/placeholder.jpg'
          }}
        />
        {/* Pool Badge */}
        <span className="absolute top-4 left-4 bg-[#0F172A]/95 text-[#D4AF37] text-[10px] uppercase font-bold tracking-widest px-3 py-1.5 border border-[#D4AF37]/40">
          <i className="fa-solid fa-water-ladder mr-1"></i> Private Pool
        </span>
        {/* Rating Badge */}
        <span className="absolute bottom-4 right-4 bg-white/95 text-[#0F172A] text-xs font-semibold px-2.5 py-1 flex items-center gap-1">
          <i className="fa-solid fa-star text-[#D4AF37]"></i>
          {villa.rating.toFixed(1)}
        </span>
      </div>

      {/* Content */}
      <div className="p-6 space-y-4 flex-grow flex flex-col justify-between">
        <div className="space-y-2">
          <div className="flex items-center text-xs text-[#D4AF37] font-semibold uppercase tracking-wider">
            <i className="fa-solid fa-map-marker-alt mr-1"></i>
            {villa.location}
          </div>
          <h3 className="font-heading text-xl font-bold text-[#0F172A] group-hover:text-[#D4AF37] transition-colors duration-300">
            {villa.name}
          </h3>
          <p className="text-sm text-gray-500 line-clamp-3">{villa.description}</p>
        </div>

        {/* Stats Strip */}
        <div className="grid grid-cols-3 gap-2 border-t border-b border-gray-100 py-4 text-center text-xs text-gray-600">
          <div>
            <i className="fa-solid fa-bed text-[#D4AF37] text-sm mb-1 block"></i>
            <strong>{villa.bedrooms}</strong> Bed
          </div>
          <div>
            <i className="fa-solid fa-bath text-[#D4AF37] text-sm mb-1 block"></i>
            <strong>{villa.bathrooms}</strong> Bath
          </div>
          <div>
            <i className="fa-solid fa-users text-[#D4AF37] text-sm mb-1 block"></i>
            <strong>{villa.guests}</strong> Guest
          </div>
        </div>

        {/* Price & CTA */}
        <div className="flex items-center justify-between pt-2">
          <div className="flex flex-col">
            <div className="mb-1">
              <span className="text-[10px] text-gray-400 uppercase tracking-wider block">Weekday</span>
              <span className="text-sm font-bold text-[#0F172A]">{formatPrice(villa.weekday_price)}</span>
            </div>
            <div>
              <span className="text-[10px] text-gray-400 uppercase tracking-wider block">Weekend</span>
              <span className="text-sm font-bold text-[#0F172A]">{formatPrice(villa.weekend_price)}</span>
            </div>
          </div>
          <Link
            to={`/villa-details?id=${villa.id}`}
            className="bg-[#0F172A] hover:bg-[#D4AF37] hover:text-[#0F172A] text-white text-xs font-semibold uppercase tracking-wider px-5 py-3.5 transition-all duration-300"
          >
            View Details
          </Link>
        </div>
      </div>
    </div>
  )
}
