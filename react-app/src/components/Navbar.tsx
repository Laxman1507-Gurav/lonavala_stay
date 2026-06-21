import { useState, useEffect } from 'react'
import { Link, useLocation } from 'react-router-dom'

const navLinks = [
  { label: 'Home', to: '/' },
  { label: 'About', to: '/about' },
  { label: "Villa's", to: '/villas' },
  { label: 'Destinations', to: '/#destinations' },
  { label: 'Offers', to: '/offers' },
  { label: 'Contact', to: '/contact' },
]

export default function Navbar() {
  const [scrolled, setScrolled] = useState(false)
  const [mobileOpen, setMobileOpen] = useState(false)
  const location = useLocation()

  useEffect(() => {
    const handleScroll = () => setScrolled(window.scrollY > 50)
    window.addEventListener('scroll', handleScroll)
    handleScroll()
    return () => window.removeEventListener('scroll', handleScroll)
  }, [])

  // Close mobile menu on route change
  useEffect(() => {
    setMobileOpen(false)
  }, [location.pathname])

  const isActive = (to: string) => {
    if (to === '/') return location.pathname === '/'
    if (to.startsWith('/#')) return false
    return location.pathname.startsWith(to)
  }

  const headerClasses = scrolled
    ? 'bg-[#0F172A] shadow-2xl py-3 md:py-4'
    : 'bg-transparent py-4 md:py-6'

  return (
    <>
      {/* Sticky Header */}
      <header
        id="main-header"
        className={`fixed top-0 w-full z-50 transition-all duration-500 px-6 text-white ${headerClasses}`}
      >
        <div className="max-w-7xl mx-auto flex justify-between items-center relative">
          {/* Logo */}
          <Link to="/" className="flex flex-col z-10">
            <span className="font-heading text-xl md:text-2xl font-bold tracking-widest text-[#D4AF37]">
              LONAVALA
            </span>
            <span className="text-[9px] md:text-[10px] uppercase tracking-[0.25em] text-white">
              Luxury Stay
            </span>
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden lg:flex space-x-8 text-sm font-semibold tracking-wider uppercase absolute left-1/2 transform -translate-x-1/2">
            {navLinks.map((link) =>
              link.to.startsWith('/#') ? (
                <a
                  key={link.label}
                  href={link.to}
                  className="hover:text-[#D4AF37] transition-all duration-300 py-2"
                >
                  {link.label}
                </a>
              ) : (
                <Link
                  key={link.label}
                  to={link.to}
                  className={`hover:text-[#D4AF37] transition-all duration-300 py-2 ${
                    isActive(link.to)
                      ? 'text-[#D4AF37] border-b-2 border-[#D4AF37]'
                      : ''
                  }`}
                >
                  {link.label}
                </Link>
              )
            )}
          </nav>

          {/* Mobile Menu Toggle */}
          <button
            id="mobile-menu-btn"
            className="lg:hidden text-white hover:text-[#D4AF37] focus:outline-none transition-colors duration-300 z-10"
            onClick={() => setMobileOpen(true)}
            aria-label="Open menu"
          >
            <i className="fa-solid fa-bars text-2xl"></i>
          </button>
        </div>
      </header>

      {/* Mobile Slide-out Drawer */}
      <div
        id="mobile-menu"
        className={`fixed inset-0 z-50 bg-[#0F172A]/95 text-white flex flex-col justify-between py-12 px-8 transition-transform duration-500 ease-in-out lg:hidden ${
          mobileOpen ? 'translate-x-0' : 'translate-x-full'
        }`}
      >
        <div>
          {/* Header row */}
          <div className="flex justify-between items-center mb-12">
            <Link to="/" className="flex flex-col" onClick={() => setMobileOpen(false)}>
              <span className="font-heading text-xl font-bold tracking-widest text-[#D4AF37]">
                LONAVALA
              </span>
              <span className="text-[9px] uppercase tracking-[0.25em] text-white">
                Luxury Stay
              </span>
            </Link>
            <button
              id="mobile-menu-close"
              className="text-white hover:text-[#D4AF37] focus:outline-none transition-colors duration-300"
              onClick={() => setMobileOpen(false)}
              aria-label="Close menu"
            >
              <i className="fa-solid fa-xmark text-2xl"></i>
            </button>
          </div>

          {/* Navigation List */}
          <nav className="flex flex-col space-y-6 text-lg font-heading tracking-wider">
            {navLinks.map((link) =>
              link.to.startsWith('/#') ? (
                <a
                  key={link.label}
                  href={link.to}
                  className="hover:text-[#D4AF37] transition-colors duration-300"
                  onClick={() => setMobileOpen(false)}
                >
                  {link.label}
                </a>
              ) : (
                <Link
                  key={link.label}
                  to={link.to}
                  className={`hover:text-[#D4AF37] transition-colors duration-300 ${
                    isActive(link.to) ? 'text-[#D4AF37]' : ''
                  }`}
                >
                  {link.label}
                </Link>
              )
            )}
          </nav>
        </div>
      </div>
    </>
  )
}
