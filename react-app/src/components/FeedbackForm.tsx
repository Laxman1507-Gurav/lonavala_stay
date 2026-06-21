import { useState } from 'react'
import { saveUserFeedback } from '../data/testimonials'

interface FeedbackFormProps {
  onSuccess?: () => void
}

export default function FeedbackForm({ onSuccess }: FeedbackFormProps) {
  const [name, setName] = useState('')
  const [rating, setRating] = useState('5')
  const [review, setReview] = useState('')
  const [status, setStatus] = useState<'idle' | 'success' | 'error'>('idle')

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault()
    if (!name.trim() || !review.trim()) {
      setStatus('error')
      return
    }
    saveUserFeedback({ name: name.trim(), rating: parseInt(rating), review: review.trim() })
    setStatus('success')
    setName('')
    setRating('5')
    setReview('')
    onSuccess?.()
    setTimeout(() => setStatus('idle'), 5000)
  }

  return (
    <section id="feedback-form-section" className="py-20 bg-[#F8F5F0] border-b border-[#D4AF37]/10">
      <div className="max-w-2xl mx-auto px-6">
        <div className="text-center space-y-3 mb-10">
          <span className="text-[#D4AF37] uppercase tracking-[0.25em] text-xs font-semibold block">
            Share Your Stay
          </span>
          <h2 className="font-heading text-2xl md:text-4xl text-[#0F172A] font-bold">
            Leave Your Feedback
          </h2>
          <div className="w-20 h-0.5 bg-[#D4AF37] mx-auto mt-4"></div>
          <p className="text-gray-500 text-xs leading-relaxed max-w-md mx-auto">
            We hope you had a luxury stay. Please share your experience with us and future guests!
          </p>
        </div>

        {/* Success Banner */}
        {status === 'success' && (
          <div className="bg-green-50 text-green-700 text-sm p-4 border border-green-200 mb-6 font-semibold flex items-center justify-center gap-2 shadow-sm">
            <i className="fa-solid fa-circle-check text-lg"></i>
            Thank you! Your review has been submitted successfully.
          </div>
        )}

        {/* Error Banner */}
        {status === 'error' && (
          <div className="bg-red-50 text-red-600 text-sm p-4 border border-red-200 mb-6 font-semibold flex items-center justify-center gap-2 shadow-sm">
            <i className="fa-solid fa-circle-xmark text-lg"></i>
            Please fill in all required fields.
          </div>
        )}

        <form onSubmit={handleSubmit} className="space-y-6 bg-white p-6 md:p-10 shadow-xl border-t-4 border-[#D4AF37]">
          <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
            <div className="space-y-1">
              <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">
                Your Name <span className="text-red-500">*</span>
              </label>
              <input
                type="text"
                value={name}
                onChange={(e) => setName(e.target.value)}
                required
                placeholder="John Doe"
                className="w-full bg-[#F8F5F0] border border-gray-200 px-4 py-3 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
              />
            </div>
            <div className="space-y-1">
              <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">
                Rating <span className="text-red-500">*</span>
              </label>
              <select
                value={rating}
                onChange={(e) => setRating(e.target.value)}
                required
                className="w-full bg-[#F8F5F0] border border-gray-200 px-4 py-3 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
              >
                <option value="5">5 Stars (Excellent)</option>
                <option value="4">4 Stars (Good)</option>
                <option value="3">3 Stars (Average)</option>
                <option value="2">2 Stars (Poor)</option>
                <option value="1">1 Star (Very Poor)</option>
              </select>
            </div>
          </div>

          <div className="space-y-1">
            <label className="text-xs uppercase font-semibold text-[#334155]/60 tracking-wider">
              Your Experience <span className="text-red-500">*</span>
            </label>
            <textarea
              value={review}
              onChange={(e) => setReview(e.target.value)}
              required
              rows={4}
              placeholder="Tell us about the pool, the views, local staff, and anything else you loved..."
              className="w-full bg-[#F8F5F0] border border-gray-200 px-4 py-3 text-xs focus:outline-none focus:border-[#D4AF37] transition-colors duration-300"
            />
          </div>

          <div className="text-center pt-2">
            <button
              type="submit"
              className="w-full sm:w-auto bg-[#0F172A] hover:bg-[#D4AF37] text-white hover:text-[#0F172A] text-xs font-bold uppercase tracking-widest px-10 py-4 transition-all duration-300 shadow-md"
            >
              Submit Review
            </button>
          </div>
        </form>
      </div>
    </section>
  )
}
