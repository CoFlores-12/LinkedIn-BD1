import React from 'react'
import './index.css'
import ToolBar from './components/toolbar.jsx'
import NavBar from './components/navbar/navbar'
import Container from './components/container/container'
import './main.css'


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