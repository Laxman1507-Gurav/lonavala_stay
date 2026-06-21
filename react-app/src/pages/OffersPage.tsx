import { Link } from 'react-router-dom'
import { allOffers } from '../data/offers'
import { formatDate } from '../utils/format'

export default function OffersPage() {
  return (
    <>
      <div className="h-28 bg-[#0F172A]"></div>

      {/* Banner */}
      <section className="bg-[#0F172A] text-white py-12 px-6 border-b border-[#D4AF37]/15">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <span className="text-[#D4AF37] tracking-[0.25em] uppercase text-xs font-semibold">Bespoke Promotions</span>
            <h1 className="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">Special Packages</h1>
          </div>
          <div className="text-sm text-gray-400">
            <Link to="/" className="hover:text-[#D4AF37] transition-colors duration-300">Home</Link>
            {' • '}
            <span className="text-[#D4AF37]">Offers</span>
          </div>
        </div>
      </section>

      {/* Offers Grid */}
      <section className="py-24 max-w-7xl mx-auto px-6">
        <div className="text-center space-y-3 mb-16">
          <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Limited Time Deals</span>
          <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Exclusive Offers</h2>
          <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          <p className="text-gray-500 max-w-xl mx-auto text-sm">
            Take advantage of our curated packages designed to give you the most luxurious experience at the best possible value.
          </p>
        </div>

        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {allOffers.map((offer) => (
            <div
              key={offer.id}
              className="bg-[#F8F5F0] border border-gray-100 hover-gold-border group flex flex-col justify-between shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl"
            >
              <div className="p-8 space-y-4">
                <div className="flex justify-between items-center">
                  <span className="bg-[#D4AF37] text-[#0F172A] font-bold text-xs uppercase px-3 py-1.5">
                    {offer.discount}
                  </span>
                  <span className="text-xs text-gray-400 flex items-center gap-1">
                    <i className="fa-solid fa-clock"></i>
                    Valid till: {formatDate(offer.expiry_date)}
                  </span>
                </div>
                <h3 className="font-heading text-2xl font-bold text-[#0F172A] group-hover:text-[#D4AF37] transition-colors duration-300">
                  {offer.title}
                </h3>
                <div className="w-12 h-0.5 bg-[#D4AF37]"></div>
                <p className="text-sm text-gray-500 leading-relaxed">{offer.description}</p>
              </div>
              <div className="px-8 pb-8">
                <Link
                  to="/villas"
                  className="w-full text-center bg-[#0F172A] hover:bg-[#D4AF37] hover:text-[#0F172A] text-white text-xs font-semibold uppercase tracking-wider py-3.5 block transition-all duration-300"
                >
                  View Villas
                </Link>
              </div>
            </div>
          ))}
        </div>
      </section>

      {/* CTA Banner */}
      <section className="py-20 bg-[#0F172A] text-white text-center border-t border-[#D4AF37]/20">
        <div className="max-w-3xl mx-auto px-6 space-y-6">
          <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold block">Act Now</span>
          <h2 className="font-heading text-3xl md:text-4xl font-bold">Don't Miss These Exclusive Deals</h2>
          <p className="text-gray-400 text-sm leading-relaxed">
            Contact us directly to avail these offers. Our concierge team will personalise the experience just for you.
          </p>
          <div className="flex flex-col sm:flex-row justify-center gap-4 pt-4">
            <Link
              to="/contact"
              className="bg-[#D4AF37] hover:bg-[#B8962E] text-[#0F172A] font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300"
            >
              <i className="fa-solid fa-envelope mr-2"></i> Enquire Now
            </Link>
            <Link
              to="/villas"
              className="bg-transparent border border-white/30 hover:bg-white/10 text-white font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300"
            >
              Browse All Villas
            </Link>
          </div>
        </div>
      </section>
    </>
  )
}
