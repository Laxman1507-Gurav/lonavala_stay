import { useState, useEffect } from 'react'
import { Link, useSearchParams } from 'react-router-dom'
import VillaCard from '../components/VillaCard'
import { allVillas } from '../data/villas'
import type { Villa } from '../types'

const locations = ['Lonavala', 'Khandala', 'Pawna Lake', 'Tiger Point', 'Bhushi Dam']
const capacities = [
  { label: 'Any BHK', value: '' },
  { label: '2BHK', value: '2BHK' },
  { label: '3BHK', value: '3BHK' },
  { label: '4BHK', value: '4BHK' },
  { label: '5BHK', value: '5BHK' },
  { label: '6BHK', value: '6BHK' },
]
const guestOptions = [
  { label: 'Any Count', value: 0 },
  { label: '2+ Guests', value: 2 },
  { label: '6+ Guests', value: 6 },
  { label: '10+ Guests', value: 10 },
  { label: '15+ Guests', value: 15 },
  { label: '20+ Guests', value: 20 },
]
const villaTypes = [
  { label: 'All Categories', value: '' },
  { label: 'Pool Villas', value: 'Pool Villas' },
  { label: 'Family Villas', value: 'Family Villas' },
  { label: 'Pet Friendly Villas', value: 'Pet Friendly Villas' },
  { label: 'Premium Villas', value: 'Premium Villas' },
]

export default function VillasPage() {
  const [searchParams] = useSearchParams()
  const initLocation = searchParams.get('location') || ''
  const initVillaType = searchParams.get('villa_type') || ''
  const initGuests = parseInt(searchParams.get('guests') || '0')

  const [filterLocation, setFilterLocation] = useState(initLocation)
  const [filterCapacity, setFilterCapacity] = useState('')
  const [filterGuests, setFilterGuests] = useState(initGuests)
  const [filterType, setFilterType] = useState(initVillaType)
  const [filtered, setFiltered] = useState<Villa[]>(allVillas)

  useEffect(() => {
    const result = allVillas.filter((v) => {
      if (filterLocation && !v.location.toLowerCase().includes(filterLocation.toLowerCase())) return false
      if (filterCapacity && v.capacity !== filterCapacity) return false
      if (filterGuests && v.guests < filterGuests) return false
      if (filterType && !v.villa_type.toLowerCase().includes(filterType.toLowerCase())) return false
      return true
    })
    setFiltered(result)
  }, [filterLocation, filterCapacity, filterGuests, filterType])

  const handleReset = () => {
    setFilterLocation('')
    setFilterCapacity('')
    setFilterGuests(0)
    setFilterType('')
  }

  return (
    <>
      {/* Header Spacer */}
      <div className="h-28 bg-[#0F172A]"></div>

      {/* Page Banner */}
      <section className="bg-[#0F172A] text-white py-12 px-6 border-b border-[#D4AF37]/15 relative overflow-hidden">
        <div
          className="absolute inset-0 bg-cover bg-center opacity-10 bg-no-repeat"
          style={{ backgroundImage: "url('/assets/images/lonavala .jpg')" }}
        ></div>
        <div className="max-w-7xl mx-auto flex flex-col md:flex-row md:items-center justify-between gap-4">
          <div>
            <span className="text-[#D4AF37] tracking-[0.25em] uppercase text-xs font-semibold">Our Exclusive Retreats</span>
            <h1 className="font-heading text-3xl md:text-5xl font-bold mt-1 text-white">The Villa Portfolio</h1>
          </div>
          <div className="text-sm text-gray-400">
            <Link to="/" className="hover:text-[#D4AF37] transition-colors duration-300">Home</Link>
            {' • '}
            <span className="text-[#D4AF37]">Villa's</span>
          </div>
        </div>
      </section>

      {/* Main Area */}
      <section className="py-16 max-w-7xl mx-auto px-6">
        <div className="grid grid-cols-1 lg:grid-cols-4 gap-10">

          {/* Sidebar Filters */}
          <div className="lg:col-span-1 space-y-6">
            <div className="bg-white p-6 shadow-md border-t-2 border-[#D4AF37] lg:sticky lg:top-24">
              <div className="flex justify-between items-center mb-6">
                <h3 className="font-heading text-lg font-bold text-[#0F172A]">
                  <i className="fa-solid fa-sliders text-[#D4AF37] mr-2"></i> Filter Stays
                </h3>
                <button
                  id="reset-filters"
                  onClick={handleReset}
                  className="text-xs text-[#D4AF37] font-semibold uppercase hover:underline"
                >
                  Clear All
                </button>
              </div>

              <div className="space-y-6">
                {/* Location */}
                <div className="space-y-2">
                  <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">Location</label>
                  <select
                    id="filter-location"
                    value={filterLocation}
                    onChange={(e) => setFilterLocation(e.target.value)}
                    className="w-full bg-[#F8F5F0] border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
                  >
                    <option value="">All Locations</option>
                    {locations.map((l) => (
                      <option key={l} value={l}>{l}</option>
                    ))}
                  </select>
                </div>

                {/* Capacity */}
                <div className="space-y-2">
                  <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">Villa Capacity</label>
                  <select
                    id="filter-capacity"
                    value={filterCapacity}
                    onChange={(e) => setFilterCapacity(e.target.value)}
                    className="w-full bg-[#F8F5F0] border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
                  >
                    {capacities.map((c) => (
                      <option key={c.value} value={c.value}>{c.label}</option>
                    ))}
                  </select>
                </div>

                {/* Guests */}
                <div className="space-y-2">
                  <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">Guests Capacity</label>
                  <select
                    id="filter-guests"
                    value={filterGuests}
                    onChange={(e) => setFilterGuests(parseInt(e.target.value))}
                    className="w-full bg-[#F8F5F0] border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
                  >
                    {guestOptions.map((g) => (
                      <option key={g.value} value={g.value}>{g.label}</option>
                    ))}
                  </select>
                </div>

                {/* Villa Type */}
                <div className="space-y-2">
                  <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">Villa Category</label>
                  <select
                    id="filter-villa-type"
                    value={filterType}
                    onChange={(e) => setFilterType(e.target.value)}
                    className="w-full bg-[#F8F5F0] border border-gray-200 px-3 py-2.5 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
                  >
                    {villaTypes.map((t) => (
                      <option key={t.value} value={t.value}>{t.label}</option>
                    ))}
                  </select>
                </div>
              </div>
            </div>
          </div>

          {/* Villa Grid */}
          <div className="lg:col-span-3 space-y-6">
            <div className="flex justify-between items-center text-sm text-gray-500 pb-4 border-b border-gray-200">
              <div>
                Showing <span id="villas-count" className="font-bold text-[#0F172A]">{filtered.length}</span> Luxury Villas
              </div>
            </div>

            {filtered.length > 0 ? (
              <div id="villas-grid" className="grid grid-cols-1 md:grid-cols-2 gap-8">
                {filtered.map((villa) => (
                  <VillaCard key={villa.id} villa={villa} />
                ))}
              </div>
            ) : (
              <div id="empty-results" className="py-24 text-center text-gray-500">
                <i className="fa-solid fa-circle-question text-5xl text-[#D4AF37]/30 mb-4 block"></i>
                <h3 className="font-heading text-2xl font-bold text-[#0F172A] mb-1">No Matching Estates</h3>
                <p className="text-sm">Try broadening your criteria or resetting filters to explore further.</p>
              </div>
            )}
          </div>
        </div>
      </section>
    </>
  )
}
