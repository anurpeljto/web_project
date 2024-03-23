import React from 'react'
import { Link } from 'react-router-dom'

const ViewAllItems = () => {
  return (
    <>
        <section className="m-auto max-w-lg my-10 px-6">
            <Link to="/tasks/" className='block bg-green-700 text-white text-center py-4 px-6 rounded-xl hover:bg-green-500'>
                View all tasks
            </Link>
        </section>
    </>
  )
}

export default ViewAllItems