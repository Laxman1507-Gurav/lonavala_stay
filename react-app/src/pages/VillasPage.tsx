import { useState, useEffect } from 'react'
import { Link, useSearchParams } from 'react-router-dom'
import VillaCard from '../components/VillaCard'
import { allVillas } from '../data/villas'
import type { Villa } from '../types'

const capacities = [
  { label: 'Any BHK', value: '' },
  { label: '2BHK', value: '2BHK' },
  { label: '3BHK', value: '3BHK' },
  { label: '4BHK', value: '4BHK' },
  { label: '5BHK', value: '5BHK' },
  { label: '6BHK', value: '6BHK' },
]

export default function VillasPage() {
  const [searchParams] = useSearchParams()
  const [filterCapacity, setFilterCapacity] = useState('')
  const [filtered, setFiltered] = useState<Villa[]>(allVillas)

  useEffect(() => {
    const result = allVillas.filter((v) => {
      if (filterCapacity && v.capacity !== filterCapacity) return false
      return true
    })
    setFiltered(result)
  }, [filterCapacity])

  const handleReset = () => {
    setFilterCapacity('')
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
