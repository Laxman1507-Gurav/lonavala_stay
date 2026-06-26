import { Link } from 'react-router-dom'
import { siteSettings } from '../data/settings'

export default function Footer() {
  const year = new Date().getFullYear()

  return (
    <footer className="bg-[#0F172A] text-white pt-16 pb-8 border-t border-[#D4AF37]/20 relative overflow-hidden">
      {/* Leaf Ornament Decoration */}
      <div className="absolute right-0 bottom-0 opacity-5 pointer-events-none transform translate-y-12 translate-x-12">
        <svg width="300" height="300" viewBox="0 0 100 100" fill="none" stroke="#D4AF37" strokeWidth="1.5">
          <path d="M10,90 Q50,50 90,10 M90,10 C80,30 60,40 50,50 C40,60 30,80 10,90 C30,80 40,60 50,50 C60,40 80,30 90,10 Z" />
          <path d="M30,70 Q45,60 50,50" />
          <path d="M50,50 Q60,45 70,30" />
        </svg>
      </div>

      <div className="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 relative z-10">
        {/* Col 1: About Brand */}
        <div className="space-y-4">
          <Link to="/" className="flex flex-col">
            <span className="font-heading text-2xl font-bold tracking-widest text-[#D4AF37]">LONAVALA</span>
            <span className="text-xs uppercase tracking-[0.25em] text-white">Luxury Stay</span>
          </Link>
          <p className="text-sm text-gray-400 leading-relaxed pt-2">
            Indulge in our curated portfolio of private pool villas offering premium hospitality,
            breathtaking mountain views, and absolute luxury escapes in Lonavala &amp; Khandala.
          </p>
          <div className="flex space-x-4 pt-4">
            {siteSettings.instagram && (
              <a href={siteSettings.instagram} target="_blank" rel="noopener noreferrer"
                className="w-10 h-10 rounded-full border border-white/10 flex items-center justify-center hover:border-[#D4AF37] hover:text-[#D4AF37] transition-all duration-300">
                <i className="fa-brands fa-instagram text-sm"></i>
              </a>
            )}
          </div>
        </div>

        {/* Col 2: Quick Links */}
        <div>
          <h4 className="font-heading text-lg font-bold tracking-wide text-[#D4AF37] mb-6 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-10 after:h-0.5 after:bg-[#D4AF37]">
            Quick Links
          </h4>
          <ul className="space-y-3 text-sm text-gray-400">
            {[
              { label: 'Home', to: '/' },
              { label: 'About Us', to: '/about' },
              { label: 'Browse Villas', to: '/villas' },

              { label: 'Contact & Support', to: '/contact' },
            ].map((link) => (
              <li key={link.label}>
                <Link to={link.to} className="hover:text-[#D4AF37] hover:translate-x-1 inline-block transition-all duration-300">
                  <i className="fa-solid fa-chevron-right text-xs text-[#D4AF37]/60 mr-2"></i>
                  {link.label}
                </Link>
              </li>
            ))}
          </ul>
        </div>

        {/* Col 3: Destinations */}
        <div>
          <h4 className="font-heading text-lg font-bold tracking-wide text-[#D4AF37] mb-6 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-10 after:h-0.5 after:bg-[#D4AF37]">
            Destinations
          </h4>
          <ul className="space-y-3 text-sm text-gray-400">
            {[
              { label: 'Lonavala Stay', location: 'Lonavala' },
              { label: 'Khandala Hills', location: 'Khandala' },
              { label: 'Pawna Lakeside', location: 'Pawna Lake' },
              { label: 'Tiger Point Heights', location: 'Tiger Point' },
              { label: 'Bhushi Dam Scenic', location: 'Bhushi Dam' },
            ].map((dest) => (
              <li key={dest.label}>
                <Link to={`/villas?location=${encodeURIComponent(dest.location)}`}
                  className="hover:text-[#D4AF37] transition-colors duration-300">
                  <i className="fa-solid fa-location-dot text-[#D4AF37]/60 mr-2"></i>
                  {dest.label}
                </Link>
              </li>
            ))}
          </ul>
        </div>

        {/* Col 4: Contact */}
        <div className="space-y-4">
          <h4 className="font-heading text-lg font-bold tracking-wide text-[#D4AF37] mb-6 relative after:content-[''] after:absolute after:left-0 after:-bottom-2 after:w-10 after:h-0.5 after:bg-[#D4AF37]">
            Resort Contact
          </h4>
          <ul className="space-y-3 text-sm text-gray-400">
            <li className="flex items-start">
              <i className="fa-solid fa-map-marker-alt text-[#D4AF37] mt-1 mr-3"></i>
              <span>{siteSettings.address}</span>
            </li>
            <li className="flex items-center">
              <i className="fa-solid fa-phone text-[#D4AF37] mr-3"></i>
              <a href={`tel:${siteSettings.phone.replace(/\s/g, '')}`}
                className="hover:text-[#D4AF37] transition-colors duration-300">
                {siteSettings.phone}
              </a>
            </li>
            <li className="flex items-center">
              <i className="fa-solid fa-envelope text-[#D4AF37] mr-3"></i>
              <a href={`mailto:${siteSettings.email}`}
                className="hover:text-[#D4AF37] transition-colors duration-300">
                {siteSettings.email}
              </a>
            </li>
          </ul>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="max-w-7xl mx-auto px-6 mt-16 pt-8 border-t border-white/10 text-center text-xs text-gray-500">
        <p>© {year} Lonavala Luxury Stay. All Rights Reserved. Crafted for Scenic Escapes.</p>
      </div>
    </footer>
  )
}
