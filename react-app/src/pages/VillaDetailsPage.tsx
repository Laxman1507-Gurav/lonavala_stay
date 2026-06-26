import { useSearchParams, Link } from 'react-router-dom'
import { allVillas } from '../data/villas'
import { siteSettings } from '../data/settings'
import { formatPrice } from '../utils/format'
import { useState } from 'react'

export default function VillaDetailsPage() {
  const [searchParams] = useSearchParams()
  const id = parseInt(searchParams.get('id') || '0')
  const villa = allVillas.find((v) => v.id === id)
  const [activeImage, setActiveImage] = useState(0)

  if (!villa) {
    return (
      <div className="min-h-[100dvh] flex flex-col items-center justify-center bg-[#F8F5F0] text-center px-6">
        <div className="h-28"></div>
        <i className="fa-solid fa-circle-question text-6xl text-[#D4AF37]/30 mb-4"></i>
        <h1 className="font-heading text-3xl font-bold text-[#0F172A] mb-2">Villa Not Found</h1>
        <p className="text-gray-500 mb-6">The villa you're looking for doesn't exist or has been removed.</p>
        <Link to="/villas" className="bg-[#0F172A] text-white px-8 py-4 text-xs font-semibold uppercase tracking-widest hover:bg-[#D4AF37] hover:text-[#0F172A] transition-all duration-300">
          Browse Villas
        </Link>
      </div>
    )
  }

  const allImages = [villa.main_image, ...villa.images]

  return (
    <>
      <div className="h-28 bg-[#0F172A]"></div>

      {/* Page Banner */}
      <section className="bg-[#0F172A] text-white py-12 px-6 border-b border-[#D4AF37]/15">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <span className="text-[#D4AF37] tracking-[0.25em] uppercase text-xs font-semibold">{villa.location}</span>
            <h1 className="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">{villa.name}</h1>
          </div>
          <div className="text-sm text-gray-400">
            <Link to="/" className="hover:text-[#D4AF37] transition-colors">Home</Link>
            {' • '}
            <Link to="/villas" className="hover:text-[#D4AF37] transition-colors">Villa's</Link>
            {' • '}
            <span className="text-[#D4AF37]">{villa.name}</span>
          </div>
        </div>
      </section>

      <section className="py-16 max-w-7xl mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-3 gap-12">

          {/* Left: Images */}
          <div className="lg:col-span-2 space-y-4">
            {/* Main Image */}
            <div className="relative overflow-hidden h-[400px] md:h-[500px] shadow-2xl">
              <img
                src={allImages[activeImage]}
                alt={villa.name}
                className="w-full h-full object-cover transition-opacity duration-300"
              />
              <span className="absolute top-4 left-4 bg-[#0F172A]/95 text-[#D4AF37] text-[10px] uppercase font-bold tracking-widest px-3 py-1.5 border border-[#D4AF37]/40">
                <i className="fa-solid fa-water-ladder mr-1"></i> Private Pool
              </span>
              <span className="absolute bottom-4 right-4 bg-white/95 text-[#0F172A] text-xs font-semibold px-2.5 py-1 flex items-center gap-1">
                <i className="fa-solid fa-star text-[#D4AF37]"></i> {villa.rating.toFixed(1)}
              </span>
            </div>

            {/* Thumbnail Strip */}
            <div className="flex gap-3 overflow-x-auto pb-2">
              {allImages.map((img, i) => (
                <button
                  key={i}
                  onClick={() => setActiveImage(i)}
                  className={`flex-shrink-0 w-20 h-16 overflow-hidden border-2 transition-all duration-300 ${
                    activeImage === i ? 'border-[#D4AF37]' : 'border-transparent'
                  }`}
                >
                  <img src={img} alt={`${villa.name} ${i + 1}`} className="w-full h-full object-cover" />
                </button>
              ))}
            </div>

            {/* Description */}
            <div className="bg-white p-8 shadow-md border-t-4 border-[#D4AF37] space-y-4">
              <h2 className="font-heading text-2xl font-bold text-[#0F172A]">About This Villa</h2>
              <p className="text-gray-600 leading-relaxed">{villa.description}</p>
            </div>

            {/* Amenities */}
            <div className="bg-white p-8 shadow-md space-y-4">
              <h2 className="font-heading text-2xl font-bold text-[#0F172A]">Amenities</h2>
              <div className="grid grid-cols-2 md:grid-cols-3 gap-3">
                {villa.amenities.map((a) => (
                  <div key={a} className="flex items-center gap-2 text-sm text-gray-600">
                    <i className="fa-solid fa-check text-[#D4AF37] text-xs"></i>
                    {a}
                  </div>
                ))}
              </div>
            </div>
          </div>

          {/* Right: Booking Card */}
          <div className="lg:col-span-1">
            <div className="bg-white shadow-xl border-t-4 border-[#D4AF37] p-8 space-y-6 lg:sticky lg:top-28">
              <div className="grid grid-cols-2 gap-4">
                <div>
                  <span className="text-[10px] text-gray-400 uppercase tracking-wider block">Weekday</span>
                  <span className="text-2xl font-bold text-[#0F172A]">{formatPrice(villa.weekday_price)}</span>
                </div>
                <div>
                  <span className="text-[10px] text-gray-400 uppercase tracking-wider block">Weekend</span>
                  <span className="text-2xl font-bold text-[#0F172A]">{formatPrice(villa.weekend_price)}</span>
                </div>
              </div>

              {/* Quick Stats */}
              <div className="grid grid-cols-3 gap-3 border-t border-b border-gray-100 py-4 text-center text-xs text-gray-600">
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

              <div className="space-y-3 text-sm text-gray-600">
                <div className="flex items-center gap-2">
                  <i className="fa-solid fa-map-marker-alt text-[#D4AF37]"></i>
                  <span>{villa.location}</span>
                </div>
                <div className="flex items-center gap-2">
                  <i className="fa-solid fa-car text-[#D4AF37]"></i>
                  <span>{villa.parking} Parking Spaces</span>
                </div>
                <div className="flex items-center gap-2">
                  <i className="fa-solid fa-water-ladder text-[#D4AF37]"></i>
                  <span>Private Pool — {villa.pool_size}</span>
                </div>
                <div className="flex items-center gap-2">
                  <i className="fa-solid fa-clock text-[#D4AF37]"></i>
                  <span>Check-in: {villa.check_in_time}</span>
                </div>
                <div className="flex items-center gap-2">
                  <i className="fa-solid fa-clock text-[#D4AF37]"></i>
                  <span>Check-out: {villa.check_out_time}</span>
                </div>
              </div>

              <Link
                to="/contact"
                className="w-full block text-center bg-[#D4AF37] hover:bg-[#B8962E] text-[#0F172A] font-bold uppercase tracking-widest text-xs px-8 py-4 transition-all duration-300 shadow-xl"
              >
                <i className="fa-solid fa-envelope mr-2"></i> Enquire Now
              </Link>

              <a
                href={`https://wa.me/${siteSettings.whatsapp.replace(/[+\s]/g, '')}?text=Hello%2C%20I%20am%20interested%20in%20booking%20${encodeURIComponent(villa.name)}.`}
                target="_blank"
                rel="noopener noreferrer"
                className="w-full block text-center bg-green-600 hover:bg-green-700 text-white font-bold uppercase tracking-widest text-xs px-8 py-4 transition-all duration-300"
              >
                <i className="fa-brands fa-whatsapp text-lg mr-2"></i> WhatsApp Us
              </a>
            </div>
          </div>
        </div>
      </section>
    </>
  )
}
