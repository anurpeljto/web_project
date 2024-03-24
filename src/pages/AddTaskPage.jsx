import React from 'react'

const AddTaskPage = () => {
  return (
    <>
        <section className='bg-white'>
            <div className="container m-auto max-w-2xl py-24">
                <div className="bg-white px-6 py-8 mb-4 shadow-md rounded-md border m-4 md:m-0">
                    <form>
                        <h2 className="text-3xl text-center font-semibold mb-6">Add task</h2>
                        <div className="mb-4">
                            <label htmlFor="type" className='block text-amber-700 font-bold mb-2'>
                                Task Type
                            </label>
                            <select name="type" id="type" className='border rounded w-full py-2 px-3 focus:border-green-600 focus:outline-green-600' required>
                                <option value="Family">Family</option>
                                <option value="Work">Work</option>
                                <option value="Leisure">Leisure</option>
                                <option value="Health">Health</option>
                                <option value="Personal">Personal</option>
                                <option value="Social">Social</option>
                            </select>
                        </div>

                        <div className="mb-4">
                            <label htmlFor="taskName" className='block text-amber-700 font-bold mb-2'>Task Name
                                <input type="text" id="taskName" name='taskName' className='border rounded w-full py-2 px-3 mb-2 focus:border-green-600 focus:outline-green-600' required placeholder='eg. Pick kids up from school'/>
                            </label>
                        </div>

                        <div className="mb-4">
                            <label htmlFor="description" className='block text-amber-700 font-bold mb-2'>
                                Description
                            </label>

                            <textarea name="description" id="description" rows="4" className='border rounded w-full py-2 px-3 focus:border-green-600 focus:outline-green-600' placeholder='Add task description'></textarea>
                        </div>

                        <div className='mb-4 grid grid-rows-3 grid-cols-2 justify-center items-center'>
                            <label htmlFor="duration" className='block text-amber-700 font-bold mb-2 col-span-2 '>Duration</label>
                            <select name="hours" id="hours" className='border rounded w-full py-2 px-3 focus:border-green-600 focus:outline-green-600' required>
                            <option value="0hours">0 hours</option>
                            <option value="1hours">1 hours</option>
                            <option value="2hours">2 hours</option>
                            <option value="3hours">3 hours</option>
                            <option value="4hours">4 hours</option>
                            <option value="5hours">5 hours</option>
                            <option value="6hours">6 hours</option>
                            <option value="7hours">7 hours</option>
                            <option value="8hours">8 hours</option>
                            <option value="9hours">9 hours</option>
                            <option value="10hours">10 hours</option>
                            <option value="11hours">11 hours</option>
                            <option value="12hours">12 hours</option>
                            <option value="13hours">13 hours</option>
                            <option value="14hours">14 hours</option>
                            <option value="15hours">15 hours</option>
                            <option value="16hours">16 hours</option>
                            <option value="17hours">17 hours</option>
                            <option value="18hours">18 hours</option>
                            <option value="19hours">19 hours</option>
                            <option value="20hours">20 hours</option>
                            <option value="21hours">21 hours</option>
                            <option value="22hours">22 hours</option>
                            <option value="23hours">23 hours</option>
                            <option value="24hours">24 hours</option>
                            </select>
                            <select name="minutes" id="minutes" className='border rounded w-full py-2 px-3 focus:border-green-600 focus:outline-green-600' required>
                            <option value="0minutes">0 minutes</option>
                                <option value="1minutes">1 minute</option>
                                <option value="2minutes">2 minutes</option>
                                <option value="3minutes">3 minutes</option>
                                <option value="4minutes">4 minutes</option>
                                <option value="5minutes">5 minutes</option>
                                <option value="6minutes">6 minutes</option>
                                <option value="7minutes">7 minutes</option>
                                <option value="8minutes">8 minutes</option>
                                <option value="9minutes">9 minutes</option>
                                <option value="10minutes">10 minutes</option>
                                <option value="11minutes">11 minutes</option>
                                <option value="12minutes">12 minutes</option>
                                <option value="13minutes">13 minutes</option>
                                <option value="14minutes">14 minutes</option>
                                <option value="15minutes">15 minutes</option>
                                <option value="16minutes">16 minutes</option>
                                <option value="17minutes">17 minutes</option>
                                <option value="18minutes">18 minutes</option>
                                <option value="19minutes">19 minutes</option>
                                <option value="20minutes">20 minutes</option>
                                <option value="21minutes">21 minutes</option>
                                <option value="22minutes">22 minutes</option>
                                <option value="23minutes">23 minutes</option>
                                <option value="24minutes">24 minutes</option>
                                <option value="25minutes">25 minutes</option>
                                <option value="26minutes">26 minutes</option>
                                <option value="27minutes">27 minutes</option>
                                <option value="28minutes">28 minutes</option>
                                <option value="29minutes">29 minutes</option>
                                <option value="30minutes">30 minutes</option>
                                <option value="31minutes">31 minutes</option>
                                <option value="32minutes">32 minutes</option>
                                <option value="33minutes">33 minutes</option>
                                <option value="34minutes">34 minutes</option>
                                <option value="35minutes">35 minutes</option>
                                <option value="36minutes">36 minutes</option>
                                <option value="37minutes">37 minutes</option>
                                <option value="38minutes">38 minutes</option>
                                <option value="39minutes">39 minutes</option>
                                <option value="40minutes">40 minutes</option>
                                <option value="41minutes">41 minutes</option>
                                <option value="42minutes">42 minutes</option>
                                <option value="43minutes">43 minutes</option>
                                <option value="44minutes">44 minutes</option>
                                <option value="45minutes">45 minutes</option>
                                <option value="46minutes">46 minutes</option>
                                <option value="47minutes">47 minutes</option>
                                <option value="48minutes">48 minutes</option>
                                <option value="49minutes">49 minutes</option>
                                <option value="50minutes">50 minutes</option>
                                <option value="51minutes">51 minutes</option>
                                <option value="52minutes">52 minutes</option>
                                <option value="53minutes">53 minutes</option>
                                <option value="54minutes">54 minutes</option>
                                <option value="55minutes">55 minutes</option>
                                <option value="56minutes">56 minutes</option>
                                <option value="57minutes">57 minutes</option>
                                <option value="58minutes">58 minutes</option>
                                <option value="59minutes">59 minutes</option>
                            </select>
                        </div>

                        <div className='mb-4'>
                            <label htmlFor="date" className='block text-amber-700 font-bold mb-2'>Date</label>
                            <input type="date" id='date' name='date' className='border rounded w-full py-2 px-3 mb-2 focus:border-green-600 focus:outline-green-600' required/>
                        </div>

                        <div>
                            <button className="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-full w-full focus:outline-none focus:shadow-outline" type='submit'>Add task</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </>
  )
}

export default AddTaskPage