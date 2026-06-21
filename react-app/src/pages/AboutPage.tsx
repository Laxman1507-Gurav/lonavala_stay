import { Link } from 'react-router-dom'

export default function AboutPage() {
  return (
    <>
      <div className="h-28 bg-[#0F172A]"></div>

      {/* Banner */}
      <section className="bg-[#0F172A] text-white py-12 px-6 border-b border-[#D4AF37]/15">
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <span className="text-[#D4AF37] tracking-[0.25em] uppercase text-xs font-semibold">Our Story</span>
            <h1 className="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">About Us</h1>
          </div>
          <div className="text-sm text-gray-400">
            <Link to="/" className="hover:text-[#D4AF37] transition-colors duration-300">Home</Link>
            {' • '}
            <span className="text-[#D4AF37]">About</span>
          </div>
        </div>
      </section>

      {/* About Section */}
      <section className="py-24 bg-white bg-leaf-pattern overflow-hidden">
        <div className="max-w-7xl mx-auto px-6 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
          <div className="relative">
            <div className="border-4 border-[#D4AF37] absolute -top-4 -left-4 w-full h-full pointer-events-none z-0 hidden sm:block"></div>
            <img
              src="/assets/images/lonavala stay.png"
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
            <p className="text-gray-600 leading-relaxed">
              We are committed to delivering experiences that go beyond a mere stay — curating memories
              that last a lifetime. From our handpicked estates to round-the-clock concierge support, every
              detail is crafted with care.
            </p>
          </div>
        </div>
      </section>

      {/* Values Section */}
      <section className="py-24 bg-[#F8F5F0] border-t border-b border-[#D4AF37]/10">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center space-y-3 mb-16">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">Our Values</span>
            <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">What Drives Us</h2>
            <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            {[
              { icon: 'fa-gem', title: 'Luxury First', desc: 'Every property is selected for its premium quality, exclusivity, and unparalleled comfort.' },
              { icon: 'fa-heart', title: 'Guest First', desc: 'Your satisfaction is our mission. We personalize every stay to exceed expectations.' },
              { icon: 'fa-leaf', title: 'Nature & Serenity', desc: "Our villas are nestled in Lonavala's scenic hills, offering peace, privacy, and natural beauty." },
            ].map((v) => (
              <div key={v.title} className="bg-white p-8 text-center space-y-4 hover:shadow-xl hover-gold-border transition-all duration-300">
                <div className="w-16 h-16 bg-[#F8F5F0] rounded-full flex items-center justify-center mx-auto">
                  <i className={`fa-solid ${v.icon} text-[#D4AF37] text-2xl`}></i>
                </div>
                <h3 className="font-heading text-xl font-bold text-[#0F172A]">{v.title}</h3>
                <p className="text-sm text-gray-500">{v.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* CTA */}
      <section className="py-20 bg-[#0F172A] text-center text-white">
        <div className="max-w-3xl mx-auto px-6 space-y-6">
          <h2 className="font-heading text-3xl md:text-5xl font-bold">Ready to Experience Luxury?</h2>
          <p className="text-gray-400 leading-relaxed">
            Browse our curated portfolio of private pool villas and find your perfect escape in Lonavala.
          </p>
          <Link
            to="/villas"
            className="inline-block bg-[#D4AF37] hover:bg-[#B8962E] text-[#0F172A] font-semibold uppercase tracking-widest text-xs px-10 py-4 transition-all duration-300 shadow-xl"
          >
            Explore Villas
          </Link>
        </div>
      </section>
    </>
  )
}
