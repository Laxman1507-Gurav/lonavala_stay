import { useState } from 'react'
import { Link } from 'react-router-dom'
import { siteSettings } from '../data/settings'

export default function ContactPage() {
  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const [phone, setPhone] = useState('')
  const [subject, setSubject] = useState('')
  const [message, setMessage] = useState('')
  const [status, setStatus] = useState<'idle' | 'success' | 'error'>('idle')

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    if (!name.trim() || !email.trim() || !phone.trim() || !message.trim()) {
      setStatus('error')
      return
    }
    // Compose WhatsApp message
    const text = encodeURIComponent(
      `New Enquiry from ${name.trim()}\nEmail: ${email.trim()}\nPhone: ${phone.trim()}\nSubject: ${subject.trim()}\nMessage: ${message.trim()}`
    )
    window.open(`https://wa.me/${siteSettings.whatsapp.replace(/[+\s]/g, '')}?text=${text}`, '_blank')
    setStatus('success')
    setName('')
    setEmail('')
    setPhone('')
    setSubject('')
    setMessage('')
    setTimeout(() => setStatus('idle'), 5000)
  }

  return (
    <>
      <div className="h-28 bg-[#0F172A]"></div>

      {/* LARGE HERO BANNER */}
      <section className="relative h-[45vh] flex items-center justify-center bg-[#0F172A] overflow-hidden">
        <div
          className="absolute inset-0 bg-cover bg-center bg-no-repeat transform scale-105"
          style={{ backgroundImage: `url('/assets/images/lonavala .jpg')` }}
        ></div>
        <div className="absolute inset-0 bg-gradient-to-b from-[#0F172A]/80 to-[#0F172A]/95"></div>

        <div className="relative text-center text-white z-10 space-y-4 px-6">
          <h1 className="font-heading text-4xl md:text-6xl font-bold tracking-wider">Contact Us</h1>
          {/* BREADCRUMB NAVIGATION */}
          <div className="text-xs uppercase tracking-widest text-[#D4AF37] font-semibold">
            <Link to="/" className="hover:underline hover:text-white transition-colors duration-300">Home</Link>
            <span className="mx-2 text-white/40">&bull;</span>
            <span>Contact</span>
          </div>
        </div>
      </section>

      {/* CONTENT SECTION */}
      <section className="py-24 bg-white bg-leaf-pattern relative">
        <div className="max-w-7xl mx-auto px-6 space-y-16">

          {/* Header Intro */}
          <div className="text-center space-y-3 max-w-2xl mx-auto">
            <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold block">Get in Touch</span>
            <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Connect With Our Concierge</h2>
            <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
            <p className="text-gray-500 text-sm leading-relaxed pt-2">
              Have questions about our villas, amenities, or corporate packages? Drop us a line below or contact us through our official support lines. Our team is available 24/7.
            </p>
          </div>

          {/* FOUR CONTACT CARDS */}
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 pt-8">
            {/* Card 1: Call Us */}
            <div className="bg-[#F8F5F0] p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
              <div className="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                <i className="fa-solid fa-phone text-[#D4AF37] text-xl"></i>
              </div>
              <h3 className="font-heading text-xl font-bold text-[#0F172A]">Call Us</h3>
              <p className="text-sm text-gray-500 min-h-[40px]">Call our concierge desk for immediate assistance and villa inquiries.</p>
              <a
                href={`tel:${siteSettings.phone.replace(/\s/g, '')}`}
                className="text-[#D4AF37] hover:text-[#0F172A] font-bold text-sm block transition-colors duration-300"
              >
                {siteSettings.phone}
              </a>
            </div>

            {/* Card 2: WhatsApp Us */}
            <div className="bg-[#F8F5F0] p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
              <div className="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                <i className="fa-brands fa-whatsapp text-green-600 text-2xl"></i>
              </div>
              <h3 className="font-heading text-xl font-bold text-[#0F172A]">WhatsApp Us</h3>
              <p className="text-sm text-gray-500 min-h-[40px]">Chat with our reservation specialist directly on WhatsApp.</p>
              <a
                href={`https://wa.me/${siteSettings.whatsapp.replace(/[+\s]/g, '')}?text=Hello%2C%20I%20am%20interested%20in%20a%20luxury%20villa%20stay.`}
                target="_blank"
                rel="noopener noreferrer"
                className="text-[#D4AF37] hover:text-[#0F172A] font-bold text-sm block transition-colors duration-300"
              >
                Chat Now
              </a>
            </div>

            {/* Card 3: Email Us */}
            <div className="bg-[#F8F5F0] p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
              <div className="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                <i className="fa-solid fa-envelope text-[#D4AF37] text-xl"></i>
              </div>
              <h3 className="font-heading text-xl font-bold text-[#0F172A]">Email Us</h3>
              <p className="text-sm text-gray-500 min-h-[40px]">Send us inquiries and our team will respond within 2 hours.</p>
              <a
                href={`mailto:${siteSettings.email}`}
                className="text-[#D4AF37] hover:text-[#0F172A] font-bold text-sm block transition-colors duration-300"
              >
                {siteSettings.email}
              </a>
            </div>

            {/* Card 4: Visit Us */}
            <div className="bg-[#F8F5F0] p-8 text-center space-y-4 border border-gray-100 hover:shadow-xl hover-gold-border transition-all duration-300">
              <div className="w-14 h-14 bg-white rounded-full flex items-center justify-center mx-auto shadow-md">
                <i className="fa-solid fa-map-location-dot text-[#D4AF37] text-xl"></i>
              </div>
              <h3 className="font-heading text-xl font-bold text-[#0F172A]">Visit Us</h3>
              <p className="text-sm text-gray-500 min-h-[40px]">Our administrative and corporate booking desk details.</p>
              <span className="text-[#D4AF37] font-bold text-sm block">
                {siteSettings.address.split(',')[0]}
              </span>
            </div>
          </div>

          {/* LARGE CENTERED CONTACT FORM */}
          <div className="max-w-3xl mx-auto pt-8">
            <div className="bg-[#F8F5F0] border border-gray-100 p-8 md:p-12 shadow-2xl relative z-10 rounded-lg">
              <h3 className="font-heading text-2xl md:text-3xl text-[#0F172A] font-bold text-center mb-8">Send A Message</h3>

              {status === 'success' && (
                <div className="bg-green-50 text-green-700 text-sm p-4 border border-green-200 mb-6 font-semibold flex items-center justify-center gap-2 rounded shadow-sm">
                  <i className="fa-solid fa-circle-check text-lg"></i> Thank you! Your message has been sent via WhatsApp. Our concierge team will contact you shortly.
                </div>
              )}

              {status === 'error' && (
                <div className="bg-red-50 text-red-600 text-sm p-4 border border-red-200 mb-6 font-semibold flex items-center justify-center gap-2 rounded shadow-sm">
                  <i className="fa-solid fa-circle-xmark text-lg"></i> Please fill in all required fields.
                </div>
              )}

              <form onSubmit={handleSubmit} className="space-y-6">
                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div className="space-y-1">
                    <label className="text-xs uppercase font-semibold text-gray-500 tracking-wider">Your Name <span className="text-red-500">*</span></label>
                    <input
                      type="text"
                      required
                      placeholder="Enter your name"
                      value={name}
                      onChange={(e) => setName(e.target.value)}
                      className="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#D4AF37] transition-colors duration-300 rounded"
                    />
                  </div>
                  <div className="space-y-1">
                    <label className="text-xs uppercase font-semibold text-gray-500 tracking-wider">Email Address <span className="text-red-500">*</span></label>
                    <input
                      type="email"
                      required
                      placeholder="example@gmail.com"
                      value={email}
                      onChange={(e) => setEmail(e.target.value)}
                      className="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#D4AF37] transition-colors duration-300 rounded"
                    />
                  </div>
                </div>

                <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
                  <div className="space-y-1">
                    <label className="text-xs uppercase font-semibold text-gray-500 tracking-wider">Phone Number <span className="text-red-500">*</span></label>
                    <input
                      type="tel"
                      required
                      placeholder="Enter your phone number"
                      value={phone}
                      onChange={(e) => setPhone(e.target.value)}
                      className="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#D4AF37] transition-colors duration-300 rounded"
                    />
                  </div>
                  <div className="space-y-1">
                    <label className="text-xs uppercase font-semibold text-gray-500 tracking-wider">Subject</label>
                    <input
                      type="text"
                      placeholder="General Inquiry / Wedding Setup / Corporate"
                      value={subject}
                      onChange={(e) => setSubject(e.target.value)}
                      className="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#D4AF37] transition-colors duration-300 rounded"
                    />
                  </div>
                </div>

                <div className="space-y-1">
                  <label className="text-xs uppercase font-semibold text-gray-500 tracking-wider">Your Message <span className="text-red-500">*</span></label>
                  <textarea
                    required
                    rows={5}
                    placeholder="Tell us how we can help make your luxury stay memorable..."
                    value={message}
                    onChange={(e) => setMessage(e.target.value)}
                    className="w-full bg-white border border-gray-200 px-4 py-3 text-sm focus:outline-none focus:border-[#D4AF37] transition-colors duration-300 rounded"
                  ></textarea>
                </div>

                {/* LUXURY BLACK BUTTON */}
                <div className="text-center pt-2">
                  <button
                    type="submit"
                    className="w-full md:w-auto bg-[#0F172A] hover:bg-[#D4AF37] text-white hover:text-[#0F172A] text-xs font-bold uppercase tracking-widest px-10 py-4 transition-all duration-500 shadow-md rounded"
                  >
                    Submit Inquiry
                  </button>
                </div>
              </form>
            </div>
          </div>

        </div>
      </section>

      {/* GOOGLE MAP SECTION */}
      <section className="h-96 w-full bg-gray-200">
        <iframe
          className="w-full h-full border-0"
          src={`https://maps.google.com/maps?q=${encodeURIComponent(siteSettings.address)}&t=&z=15&ie=UTF8&iwloc=&output=embed`}
          allowFullScreen={true}
          loading="lazy"
          referrerPolicy="no-referrer-when-downgrade"
          title="Google Map Location"
        ></iframe>
      </section>
    </>
  )
}
