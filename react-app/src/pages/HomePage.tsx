import { useState, useEffect } from 'react'
import { Link, useLocation } from 'react-router-dom'
import { Swiper, SwiperSlide } from 'swiper/react'
import { Navigation, Pagination, Autoplay } from 'swiper/modules'

import Hero from '../components/Hero'
import VillaCard from '../components/VillaCard'
import FeedbackForm from '../components/FeedbackForm'

import { featuredVillas } from '../data/villas'
import { allDestinations } from '../data/destinations'
import { getAllTestimonials } from '../data/testimonials'
import { siteSettings } from '../data/settings'
import { formatDate } from '../utils/format'
import type { Testimonial } from '../types'

const highlights = [
  { icon: 'fa-water-ladder', title: 'Private Pools', desc: 'All villas include exclusive private pools' },
  { icon: 'fa-circle-check', title: 'Verified Stays', desc: 'Handpicked & quality-tested estates' },
  { icon: 'fa-bell-concierge', title: '24/7 Concierge', desc: 'Dedicated support around the clock' },
  { icon: 'fa-mountain-sun', title: 'Scenic Views', desc: 'Valley & lakeside premium locations' },
]

const whyUs = [
  { icon: 'fa-circle-check', title: 'Verified Villas', desc: 'Every single estate is handpicked and undergoes a rigorous quality standard test before listing.' },
  { icon: 'fa-water-ladder', title: 'Private Pools', desc: 'All properties include clean, private infinity or temperature-controlled pools for absolute isolation.' },
  { icon: 'fa-bell-concierge', title: 'Luxury Hospitality', desc: 'Includes a team of trained caretakers, security staff, and professional chefs to cater to your needs.' },
  { icon: 'fa-map-pin', title: 'Prime Locations', desc: 'Properties are situated in prime locations offering maximum valley or waterside views.' },
  { icon: 'fa-tags', title: 'Best Pricing', desc: 'Direct enquiries mean no third-party platform fees, giving you the best possible luxury rate.' },
  { icon: 'fa-headset', title: '24/7 Assistance', desc: 'Our concierge support desk is online round-the-clock to manage inquiries, check-in arrangements, and personalised requests.' },
]

const categories = [
  { name: 'Pool Villas', icon: 'fa-water-ladder', desc: 'Stunning estates with sprawling private pools.' },
  { name: 'Family Villas', icon: 'fa-people-roof', desc: 'Multi-bedroom stays designed for family comfort.' },
  { name: 'Premium Villas', icon: 'fa-gem', desc: 'Signature estates with bespoke luxury design.' },
]


export default function HomePage() {
  const [testimonials, setTestimonials] = useState<Testimonial[]>([])
  const location = useLocation()

  useEffect(() => {
    setTestimonials(getAllTestimonials())
  }, [])

  useEffect(() => {
    if (location.search.includes('scrollTo=destinations')) {
      const element = document.getElementById('destinations')
      if (element) {
        setTimeout(() => element.scrollIntoView({ behavior: 'smooth' }), 100)
      }
    }
  }, [location])



  const handleFeedbackSuccess = () => {
    setTestimonials(getAllTestimonials())
  }

  return (
    <>
      {/* Section 1: Hero */}
      <Hero />

      {/* Section 2: Highlights Strip */}
      <section className="relative -mt-16 z-20 max-w-6xl mx-auto px-6">
        <div className="bg-white/95 backdrop-blur-md shadow-2xl p-6 md:p-8 border-t-4 border-[#D4AF37]">
          <div className="grid grid-cols-2 sm:grid-cols-4 gap-6 text-center">
            {highlights.map((h) => (
              <div key={h.title} className="space-y-2">
                <div className="w-12 h-12 bg-[#F8F5F0] rounded-full flex items-center justify-center mx-auto">
                  <i className={`fa-solid ${h.icon} text-[#D4AF37] text-xl`}></i>
                </div>
                <h4 className="font-heading font-bold text-[#0F172A] text-sm">{h.title}</h4>
                <p className="text-xs text-gray-500">{h.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Section 3: Featured Villas */}
      <section className="py-24 max-w-7xl mx-auto px-6">
        <div className="text-center space-y-3 mb-16">
          <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Exquisite Collection</span>
          <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Featured Luxury Villas</h2>
          <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
        </div>
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {featuredVillas.map((villa) => (
            <VillaCard key={villa.id} villa={villa} />
          ))}
        </div>
      </section>

      {/* Section 4: About */}
      <section className="py-24 bg-white bg-leaf-pattern overflow-hidden">
        <div className="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div className="relative">
            <div className="border-4 border-[#D4AF37] absolute -top-4 -left-4 w-full h-full pointer-events-none transform -translate-x-2 -translate-y-2 z-0 hidden sm:block"></div>
            <img
              src="/assets/images/Index.jpg"
              alt="Luxury Estate Living"
              className="w-full h-[200px] sm:h-[280px] md:h-[350px] object-cover relative z-10 shadow-2xl rounded-lg"
            />
          </div>
          <div className="space-y-6">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold block">About Our Legacy</span>
            <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Uncompromising Resort Hospitality</h2>
            <p className="text-gray-600 leading-relaxed">
              Lonavala Luxury Stay is an exclusive portfolio of bespoke properties and vacation rentals.
              Crafted with a premium hotel-style approach, our properties deliver the ultimate comfort of
              private residential living mixed with elite resort hospitality.
            </p>
            <p className="text-gray-600 leading-relaxed">
              Whether you seek an infinity pool over the Khandala ridges, a cozy romantic bonfire at
              Pawna Lake, or a majestic 7-bedroom party villa, we ensure verified properties, private
              staff assistance, and top-tier amenities.
            </p>
            <div className="pt-4">
              <Link
                to="/about"
                className="bg-[#0F172A] hover:bg-[#D4AF37] hover:text-[#0F172A] text-white text-xs font-semibold uppercase tracking-widest px-8 py-4 transition-all duration-300 inline-block shadow-lg"
              >
                Know More
              </Link>
            </div>
          </div>
        </div>
      </section>

      {/* Section 5: Why Choose Us */}
      <section className="py-24 bg-[#F8F5F0] border-t border-b border-[#D4AF37]/10">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center space-y-3 mb-16">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Our Distinction</span>
            <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Why Luxury Stays With Us</h2>
            <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {whyUs.map((item) => (
              <div key={item.title} className="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div className="w-16 h-16 bg-[#F8F5F0] rounded-full flex items-center justify-center mx-auto">
                  <i className={`fa-solid ${item.icon} text-[#D4AF37] text-2xl`}></i>
                </div>
                <h3 className="font-heading text-xl font-bold text-[#0F172A]">{item.title}</h3>
                <p className="text-sm text-gray-500">{item.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Section 6: Villa Categories */}
      <section className="py-24 bg-white">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center space-y-3 mb-6">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Select Your Style</span>
            <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Explore Categories</h2>
            <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          </div>
          {/* Clarification banner */}
          <div className="flex items-center justify-center gap-3 mb-12 bg-[#F8F5F0] border border-[#D4AF37]/30 px-6 py-4 max-w-2xl mx-auto">
            <i className="fa-solid fa-circle-info text-[#D4AF37] text-lg shrink-0"></i>
            <p className="text-sm text-gray-600 text-center">
              All our villas come with a <span className="font-semibold text-[#0F172A]">private pool</span>, are <span className="font-semibold text-[#0F172A]">family-friendly</span>, and offer a <span className="font-semibold text-[#0F172A]">premium experience</span> — these categories help you find the right style for your stay.
            </p>
          </div>
          <div className="grid grid-cols-1 sm:grid-cols-3 gap-6">
            {categories.map((cat) => (
              <Link
                key={cat.name}
                to={`/villas?villa_type=${encodeURIComponent(cat.name)}`}
                className="group bg-[#F8F5F0] p-8 flex flex-col justify-between hover:bg-[#0F172A] hover:text-white transition-all duration-500 hover:shadow-2xl border border-gray-100"
              >
                <div className="space-y-4">
                  <div className="w-12 h-12 rounded-full bg-white flex items-center justify-center text-[#D4AF37] group-hover:bg-[#D4AF37] group-hover:text-[#0F172A] transition-all duration-500">
                    <i className={`fa-solid ${cat.icon} text-lg`}></i>
                  </div>
                  <h3 className="font-heading text-xl font-bold text-[#0F172A] group-hover:text-white transition-colors duration-300">
                    {cat.name}
                  </h3>
                  <p className="text-sm text-gray-500 group-hover:text-gray-300 transition-colors duration-300">
                    {cat.desc}
                  </p>
                </div>
                <div className="pt-6 flex items-center text-xs font-semibold text-[#D4AF37] uppercase tracking-wider group-hover:translate-x-2 transition-transform duration-300">
                  Browse Category <i className="fa-solid fa-arrow-right ml-2"></i>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      {/* Section 7: Popular Destinations */}
      <section id="destinations" className="py-24 bg-[#F8F5F0]">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center space-y-3 mb-16">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Scenic Escapes</span>
            <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Popular Destinations</h2>
            <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          </div>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            {allDestinations.map((dest) => (
              <Link
                key={dest.name}
                to={`/destination?name=${encodeURIComponent(dest.name)}`}
                className="group relative h-80 overflow-hidden block shadow-lg"
              >
                <div
                  className="absolute inset-0 bg-cover bg-center transition-transform duration-700 group-hover:scale-110"
                  style={{ backgroundImage: `url('${dest.image}')` }}
                ></div>
                <div className="absolute inset-0 bg-gradient-to-t from-[#0F172A]/90 via-[#0F172A]/30 to-transparent group-hover:from-[#0F172A]/95 transition-all duration-300"></div>
                <div className="absolute bottom-6 left-6 right-6 text-white space-y-1">
                  <h3 className="font-heading text-xl font-bold text-white group-hover:text-[#D4AF37] transition-colors duration-300">
                    {dest.name}
                  </h3>
                  <p className="text-xs text-gray-300">{dest.desc}</p>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>


      {/* Section 9: Testimonials */}
      <section className="py-24 bg-[#0F172A] text-white overflow-hidden relative">
        <div className="max-w-4xl mx-auto px-6 text-center space-y-8 relative z-10">
          <div className="text-center space-y-3 mb-8">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Guest Experiences</span>
            <h2 className="font-heading text-3xl md:text-5xl text-white font-bold">What Our Guests Say</h2>
            <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          </div>
          <Swiper
            modules={[Navigation, Autoplay]}
            slidesPerView={1}
            loop={true}
            autoplay={{ delay: 5000 }}
            navigation={{ enabled: true }}
            className="testimonials-swiper"
          >
            {testimonials.map((t, i) => (
              <SwiperSlide key={i} className="flex flex-col items-center space-y-6 pb-4">
                <div className="flex flex-col items-center space-y-6">
                  <i className="fa-solid fa-quote-left text-[#D4AF37]/25 text-5xl"></i>
                  <p className="text-gray-300 text-lg md:text-xl font-light italic leading-relaxed max-w-2xl mx-auto">
                    "{t.review}"
                  </p>
                  <div className="flex flex-col items-center space-y-2">
                    <div className="flex text-[#D4AF37] text-xs gap-1">
                      {Array.from({ length: t.rating }).map((_, j) => (
                        <i key={j} className="fa-solid fa-star"></i>
                      ))}
                    </div>
                    <span className="font-heading font-semibold text-lg text-[#D4AF37]">{t.name}</span>
                    <span className="text-xs text-gray-500 uppercase tracking-widest">Verified Luxury Guest</span>
                  </div>
                </div>
              </SwiperSlide>
            ))}
          </Swiper>
        </div>
      </section>

      {/* Section 9.5: Feedback Form */}
      <FeedbackForm onSuccess={handleFeedbackSuccess} />

      {/* Section 11: Enquiry CTA */}
      <section className="py-24 bg-[#0F172A] relative overflow-hidden text-center text-white border-t border-[#D4AF37]/30">
        <div
          className="absolute inset-0 bg-cover bg-center opacity-20 bg-no-repeat"
          style={{ backgroundImage: "url('/assets/images/hero_bg.png')" }}
        ></div>
        <div className="relative max-w-4xl mx-auto px-6 space-y-6 z-10">
          <span className="text-[#D4AF37] tracking-[0.25em] uppercase text-xs font-semibold block">
            Unforgettable Retreats
          </span>
          <h2 className="font-heading text-3xl md:text-5xl font-bold leading-tight">
            Ready For Your Luxury Escape? <br /> Enquire About Your Dream Villa Today
          </h2>
          <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          <div className="flex flex-col sm:flex-row justify-center items-center gap-4 pt-6">
            <Link
              to="/contact"
              className="w-full sm:w-auto bg-[#D4AF37] hover:bg-[#B8962E] text-[#0F172A] font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 shadow-xl"
            >
              <i className="fa-solid fa-envelope mr-2"></i> Contact Us
            </Link>
            <a
              href={`https://wa.me/${siteSettings.whatsapp.replace(/[+\s]/g, '')}?text=Hello%2C%20I%20am%20interested%20in%20a%20luxury%20villa%20stay.`}
              target="_blank"
              rel="noopener noreferrer"
              className="w-full sm:w-auto bg-green-600 hover:bg-green-700 text-white font-semibold uppercase tracking-wider text-xs px-8 py-4 transition-all duration-300 flex items-center justify-center gap-2"
            >
              <i className="fa-brands fa-whatsapp text-lg"></i> WhatsApp Us
            </a>
          </div>
        </div>
      </section>
    </>
  )
}
