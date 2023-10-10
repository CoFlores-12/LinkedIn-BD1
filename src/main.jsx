import React from 'react'
import ReactDOM from 'react-dom/client'
import './index.css'
import ToolBar from './components/toolbar.jsx'
import NavBar from './components/navbar/navbar'

ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    <ToolBar />
    <NavBar />
  </React.StrictMode>,
)
