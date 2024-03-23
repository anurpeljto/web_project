import React from 'react'
import {Link} from 'react-router-dom';

const Item = ({item}) => {
  return (
    <div className="bg-gray-100 rounded-xl shadow-md relative">
                        <div className="p-4">
                            <div className="mb-6">
                                <div className="text-amber-600 my-2">{item.duration}</div>
                                <h3 className="text-xl font-bold">{item.title}</h3>
                            </div>

                            <div className="mb-5">
                                {item.description}
                            </div>

                            <div className="text-green-500">Due {item.due_date}</div>
                            <div className="border border-gray-100 mb-5"></div>
                            <div className="flex flex-col lg:flex-row justify-between mb-4">
                                <div className="text-amber-700 mb-3">
                                    {item.category}
                                </div>
                                <Link to={`/tasks/${item.id}`} className='h-[36px] bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg text-center text-sm'>
                                    See task
                                </Link>
                            </div>
                        </div>
                    </div>
  )
}

export default Item