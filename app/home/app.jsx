"use client"
import React from 'react'
import NavBar from '../components/navbar/navbar'
import Container from '../components/container/container'
import ToolBar from '../components/toolbar/toolbar.jsx'

function App() {
  const [view, setView] = React.useState('home')

  return (
    <React.StrictMode>
      <ToolBar />
      <Container view={view}/>
      <NavBar viewState={view} setView={setView}/>
    </React.StrictMode>
  )
}

export default App