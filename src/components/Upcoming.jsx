import React from 'react'
import todo from '../todo.json';

const Upcoming = () => {
  return (
    <>
        <section className='bg-green-40 px-4 py-10'>
            <div className="container-xl lg:container m-auto">
                <h2 className="text-3xl font-bold text-green-500 mb-6 text-center">
                    Upcoming chores
                </h2>
                <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
                    {todo.map((item) => (
                        <div className="bg-white rounded-xl shadow-md relative">
                        <div className="p-4">
                            <div className="mb-6">
                                <div className="text-gray-600 my-2">{item.duration}</div>
                                <h3 className="text-xl font-bold">{item.title}</h3>
                            </div>

                            <div className="mb-5">
                                {item.description}
                            </div>

                            <div className="text-green-500">{item.due_date}</div>
                            <div className="border border-gray-100 mb-5"></div>
                            <div className="flex flex-col lg:flex-row justify-between mb-4">
                                <div className="text-amber-700 mb-3">
                                    {item.category}
                                </div>
                                <a href="chore.html" className='h-[36px] bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-center text-sm'>
                                    Modify chore
                                </a>
                            </div>
                        </div>
                    </div>
                    ))}
                    
                </div>
            </div>
        </section>
    </>
  )
}

export default Upcoming