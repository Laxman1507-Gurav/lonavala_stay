import { useSearchParams, Link } from 'react-router-dom'
import { allDestinations } from '../data/destinations'

export default function DestinationPage() {
  const [searchParams] = useSearchParams()
  const name = searchParams.get('name') || ''
  const destination = allDestinations.find((d) => d.name === name)

  if (!destination) {
    return (
      <div className="min-h-[100dvh] flex flex-col items-center justify-center bg-[#F8F5F0] text-center px-6">
        <div className="h-28"></div>
        <i className="fa-solid fa-map-location-dot text-6xl text-[#D4AF37]/30 mb-4"></i>
        <h1 className="font-heading text-3xl font-bold text-[#0F172A] mb-2">Destination Not Found</h1>
        <p className="text-gray-500 mb-6">We couldn't find the destination you're looking for.</p>
        <Link to="/" className="bg-[#0F172A] text-white px-8 py-4 text-xs font-semibold uppercase tracking-widest hover:bg-[#D4AF37] hover:text-[#0F172A] transition-all duration-300">
          Back to Home
        </Link>
      </div>
    )
  }

  return (
    <>
      <div className="h-28 bg-[#0F172A]"></div>

      {/* Destination Hero */}
      <section className="relative h-[60vh] md:h-[70vh] flex items-center justify-center bg-[#0F172A] overflow-hidden">
        <div
          className="absolute inset-0 bg-cover bg-center bg-no-repeat transform scale-105"
          style={{ backgroundImage: `url('${destination.image}')` }}
        ></div>
        <div className="absolute inset-0 bg-gradient-to-b from-[#0F172A]/80 to-[#0F172A]/95"></div>

        <div className="relative text-center text-white z-10 space-y-4 px-6 max-w-4xl mx-auto">
          <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold block">Explore Nature</span>
          <h1 className="font-heading text-5xl md:text-7xl font-bold tracking-wider text-[#D4AF37]">{destination.name}</h1>
          <p className="text-gray-300 text-sm md:text-lg leading-relaxed pt-2 max-w-2xl mx-auto">
            {destination.long_desc}
          </p>
          {/* Breadcrumb */}
          <div className="text-xs uppercase tracking-widest text-[#D4AF37] font-semibold pt-8">
            <Link to="/" className="hover:underline hover:text-white transition-colors duration-300">Home</Link>
            <span className="mx-2 text-white/40">&bull;</span>
            <span>Destinations</span>
            <span className="mx-2 text-white/40">&bull;</span>
            <span className="text-white">{destination.name}</span>
          </div>
        </div>
      </section>

      {/* Nature & Environment Content */}
      <section className="py-24 max-w-4xl mx-auto px-6">
        <div className="text-center space-y-3 mb-16">
          <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold">The Environment</span>
          <h2 className="font-heading text-3xl md:text-5xl text-[#0F172A] font-bold">Immerse Yourself In Nature</h2>
          <div className="w-24 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
        </div>

        <div className="space-y-12">
          {destination.nature_paragraphs.map((paragraph, index) => (
            <div key={index} className="flex flex-col md:flex-row gap-6 md:gap-12 items-start group">
              <div className="w-16 h-16 shrink-0 bg-[#F8F5F0] rounded-full flex items-center justify-center border border-[#D4AF37]/20 group-hover:bg-[#D4AF37] transition-colors duration-500">
                <i className={`fa-solid ${index === 0 ? 'fa-leaf' : index === 1 ? 'fa-cloud-sun' : 'fa-tree'} text-[#D4AF37] text-2xl group-hover:text-[#0F172A] transition-colors duration-500`}></i>
              </div>
              <p className="text-gray-600 leading-relaxed md:text-lg pt-2">
                {paragraph}
              </p>
            </div>
          ))}
        </div>

        <div className="mt-20 text-center border-t border-[#D4AF37]/20 pt-16">
          <h3 className="font-heading text-2xl font-bold text-[#0F172A] mb-4">Ready to experience {destination.name}?</h3>
          <p className="text-gray-500 mb-8 max-w-lg mx-auto">Browse our exquisite collection of luxury villas located in and around this beautiful destination.</p>
          <Link
            to={`/villas?location=${encodeURIComponent(destination.name)}`}
            className="inline-block bg-[#0F172A] hover:bg-[#D4AF37] hover:text-[#0F172A] text-white text-xs font-semibold uppercase tracking-widest px-10 py-4 transition-all duration-300 shadow-xl"
          >
            Explore Stays Here
          </Link>
        </div>
      </section>
    </>
  )
}

