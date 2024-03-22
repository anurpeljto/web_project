import React from 'react'
import Upcoming from '../components/Upcoming';
import ViewAllItems from '../components/ViewAllItems';


const HomePage = () => {
  return (
    <>
        <Upcoming isHome='true'/>
        <ViewAllItems />
    </>
  )
}

export default HomePage