import React, { useEffect, useState } from "react";
import { createRoot } from "react-dom/client";
import axios from "axios";
export default function App() {
    const [Post, setPost] = useState([]);
    useEffect(() => {
        fetchPost();
        console.log(Post);
    });
    const fetchPost = () => {
        axios.get(`http://127.0.0.1:8000/api/products`).then((d) => {
            setPost(d.data);
        });
    };

    return (
        <>
            <div id="header-wrap">
                <div className="top-content">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-6">
                                <div className="social-links">
                                    {/* {Post.length} */}
                                    <ul>
                                        <li>
                                            <a href="#">
                                                <i className="icon icon-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i className="icon icon-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i className="icon icon-youtube-play"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i className="icon icon-behance-square"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div className="col-md-6">
                                <div className="right-element">
                                    <a
                                        href="#"
                                        className="user-account for-buy"
                                    >
                                        <i className="icon icon-user"></i>
                                        <span>Account</span>
                                    </a>
                                    <a href="#" className="cart for-buy">
                                        <i className="icon icon-clipboard"></i>
                                        <span>Cart:(0 $)</span>
                                    </a>

                                    <div className="action-menu">
                                        <div className="search-bar">
                                            <a
                                                href="#"
                                                className="search-button search-toggle"
                                                data-selector="#header-wrap"
                                            >
                                                <i className="icon icon-search"></i>
                                            </a>
                                            <form
                                                role="search"
                                                method="get"
                                                className="search-box"
                                            >
                                                <input
                                                    className="search-field text search-input"
                                                    placeholder="Search"
                                                    type="search"
                                                />
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <header id="header">
                    <div className="container">
                        <div className="row">
                            <div className="col-md-2">
                                <div className="main-logo">
                                    <a href="index.html">
                                        <img
                                            src="assets_frontend/images/main-logo.png"
                                            alt="logo"
                                        />
                                    </a>
                                </div>
                            </div>

                            <div className="col-md-10">
                                <nav id="navbar">
                                    <div className="main-menu stellarnav">
                                        <ul className="menu-list">
                                            <li className="menu-item active">
                                                <a
                                                    href="#home"
                                                    data-effect="Home"
                                                >
                                                    Home
                                                </a>
                                            </li>
                                            <li className="menu-item">
                                                <a
                                                    href="#popular-books"
                                                    className="nav-link"
                                                    data-effect="Shop"
                                                >
                                                    Shop
                                                </a>
                                            </li>
                                            <li className="menu-item">
                                                <a
                                                    href="#latest-blog"
                                                    className="nav-link"
                                                    data-effect="Articles"
                                                >
                                                    Articles
                                                </a>
                                            </li>
                                        </ul>

                                        <div className="hamburger">
                                            <span className="bar"></span>
                                            <span className="bar"></span>
                                            <span className="bar"></span>
                                        </div>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </header>
            </div>

            <section id="featured-books">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="section-header align-center">
                                <div className="title">
                                    <span>Some quality items</span>
                                </div>
                                <h2 className="section-title">
                                    Featured Books
                                </h2>
                            </div>

                            <div className="product-list" data-aos="fade-up">
                                <div className="row">
                                    {Post.length > 0 &&
                                        Post.map((row, key) => (
                                            <div className="col-md-3">
                                                <figure className="product-style">
                                                    <img
                                                        src={row.feature_image}
                                                        alt="Books"
                                                        className="product-item"
                                                    />
                                                    <button
                                                        type="button"
                                                        className="add-to-cart"
                                                        data-product-tile="add-to-cart"
                                                    >
                                                        Add to Cart
                                                    </button>
                                                    <figcaption>
                                                        <h3>{row.name}</h3>
                                                        <p>Armor Ramsey</p>
                                                        <div className="item-price">
                                                            {row.price}
                                                        </div>
                                                    </figcaption>
                                                </figure>
                                            </div>
                                        ))}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="row">
                        <div className="col-md-12">
                            <div className="btn-wrap align-right">
                                <a href="#" className="btn-accent-arrow">
                                    View all products{" "}
                                    <i className="icon icon-ns-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div id="client-holder" data-aos="fade-up">
                <div className="container">
                    <div className="row">
                        <div className="inner-content">
                            <div className="logo-wrap">
                                <div className="grid">
                                    <a href="#">
                                        <img
                                            src="assets_frontend/images/client-image1.png"
                                            alt="client"
                                        />
                                    </a>
                                    <a href="#">
                                        <img
                                            src="assets_frontend/images/client-image2.png"
                                            alt="client"
                                        />
                                    </a>
                                    <a href="#">
                                        <img
                                            src="assets_frontend/images/client-image3.png"
                                            alt="client"
                                        />
                                    </a>
                                    <a href="#">
                                        <img
                                            src="assets_frontend/images/client-image4.png"
                                            alt="client"
                                        />
                                    </a>
                                    <a href="#">
                                        <img
                                            src="assets_frontend/images/client-image5.png"
                                            alt="client"
                                        />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <section id="best-selling" className="leaf-pattern-overlay">
                <div className="corner-pattern-overlay"></div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-8 col-md-offset-2">
                            <div className="row">
                                <div className="col-md-6">
                                    <figure className="products-thumb">
                                        <img
                                            src="assets_frontend/images/single-image.jpg"
                                            alt="book"
                                            className="single-image"
                                        />
                                    </figure>
                                </div>

                                <div className="col-md-6">
                                    <div className="product-entry">
                                        <h2 className="section-title divider">
                                            Best Selling Book
                                        </h2>

                                        <div className="products-content">
                                            <div className="author-name">
                                                By Timbur Hood
                                            </div>
                                            <h3 className="item-title">
                                                Birds gonna be happy
                                            </h3>
                                            <p>
                                                Lorem ipsum dolor sit amet,
                                                consectetur adipiscing elit. Sed
                                                eu feugiat amet, libero ipsum
                                                enim pharetra hac.
                                            </p>
                                            <div className="item-price">
                                                $ 45.00
                                            </div>
                                            <div className="btn-wrap">
                                                <a
                                                    href="#"
                                                    className="btn-accent-arrow"
                                                >
                                                    shop it now{""}
                                                    <i className="icon icon-ns-arrow-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="subscribe">
                <div className="container">
                    <div className="row">
                        <div className="col-md-8 col-md-offset-2">
                            <div className="row">
                                <div className="col-md-6">
                                    <div className="title-element">
                                        <h2 className="section-title divider">
                                            Subscribe to our newsletter
                                        </h2>
                                    </div>
                                </div>
                                <div className="col-md-6">
                                    <div
                                        className="subscribe-content"
                                        data-aos="fade-up"
                                    >
                                        <p>
                                            Sed eu feugiat amet, libero ipsum
                                            enim pharetra hac dolor sit amet,
                                            consectetur. Elit adipiscing enim
                                            pharetra hac.
                                        </p>
                                        <form id="form">
                                            <input
                                                type="text"
                                                name="email"
                                                placeholder="Enter your email addresss here"
                                            />
                                            <button className="btn-subscribe">
                                                <span>send</span>
                                                <i className="icon icon-send"></i>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="latest-blog">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="section-header align-center">
                                <div className="title">
                                    <span>Read our articles</span>
                                </div>
                                <h2 className="section-title">
                                    Latest Articles
                                </h2>
                            </div>

                            <div className="row">
                                <div className="col-md-4">
                                    <article
                                        className="column"
                                        data-aos="fade-up"
                                    >
                                        <figure>
                                            <a
                                                href="#"
                                                className="image-hvr-effect"
                                            >
                                                <img
                                                    src="assets_frontend/images/post-img1.jpg"
                                                    alt="post"
                                                    className="post-image"
                                                />
                                            </a>
                                        </figure>

                                        <div className="post-item">
                                            <div className="meta-date">
                                                Mar 30, 2021
                                            </div>
                                            <h3>
                                                <a href="#">
                                                    Reading books always makes
                                                    the moments happy
                                                </a>
                                            </h3>

                                            <div className="links-element">
                                                <div className="categories">
                                                    inspiration
                                                </div>
                                                <div className="social-links">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-behance-square"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div className="col-md-4">
                                    <article
                                        className="column"
                                        data-aos="fade-down"
                                    >
                                        <figure>
                                            <a
                                                href="#"
                                                className="image-hvr-effect"
                                            >
                                                <img
                                                    src="assets_frontend/images/post-img2.jpg"
                                                    alt="post"
                                                    className="post-image"
                                                />
                                            </a>
                                        </figure>
                                        <div className="post-item">
                                            <div className="meta-date">
                                                Mar 29, 2021
                                            </div>
                                            <h3>
                                                <a href="#">
                                                    Reading books always makes
                                                    the moments happy
                                                </a>
                                            </h3>

                                            <div className="links-element">
                                                <div className="categories">
                                                    inspiration
                                                </div>
                                                <div className="social-links">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-behance-square"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                                <div className="col-md-4">
                                    <article
                                        className="column"
                                        data-aos="fade-up"
                                    >
                                        <figure>
                                            <a
                                                href="#"
                                                className="image-hvr-effect"
                                            >
                                                <img
                                                    src="assets_frontend/images/post-img3.jpg"
                                                    alt="post"
                                                    className="post-image"
                                                />
                                            </a>
                                        </figure>
                                        <div className="post-item">
                                            <div className="meta-date">
                                                Feb 27, 2021
                                            </div>
                                            <h3>
                                                <a href="#">
                                                    Reading books always makes
                                                    the moments happy
                                                </a>
                                            </h3>

                                            <div className="links-element">
                                                <div className="categories">
                                                    inspiration
                                                </div>
                                                <div className="social-links">
                                                    <ul>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-facebook"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-twitter"></i>
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a href="#">
                                                                <i className="icon icon-behance-square"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>

                            <div className="row">
                                <div className="btn-wrap align-center">
                                    <a
                                        href="#"
                                        className="btn btn-outline-accent btn-accent-arrow"
                                        tabindex="0"
                                    >
                                        Read All Articles
                                        <i className="icon icon-ns-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="download-app" className="leaf-pattern-overlay">
                <div className="corner-pattern-overlay"></div>
                <div className="container">
                    <div className="row">
                        <div className="col-md-8 col-md-offset-2">
                            <div className="row">
                                <div className="col-md-5">
                                    <figure>
                                        <img
                                            src="assets_frontend/images/device.png"
                                            alt="phone"
                                            className="single-image"
                                        />
                                    </figure>
                                </div>

                                <div className="col-md-7">
                                    <div className="app-info">
                                        <h2 className="section-title divider">
                                            Download our app now !
                                        </h2>
                                        <p>
                                            Lorem ipsum dolor sit amet,
                                            consectetur adipiscing elit.
                                            Sagittis sed ptibus liberolectus
                                            nonet psryroin. Amet sed lorem
                                            posuere sit iaculis amet, ac urna.
                                            Adipiscing fames semper erat ac in
                                            suspendisse iaculis.
                                        </p>
                                        <div className="google-app">
                                            <img
                                                src="assets_frontend/images/google-play.jpg"
                                                alt="google play"
                                            />
                                            <img
                                                src="assets_frontend/images/app-store.jpg"
                                                alt="app store"
                                            />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer id="footer">
                <div className="container">
                    <div className="row">
                        <div className="col-md-4">
                            <div className="footer-item">
                                <div className="company-brand">
                                    <img
                                        src="assets_frontend/images/main-logo.png"
                                        alt="logo"
                                        className="footer-logo"
                                    />
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur
                                        adipiscing elit. Sagittis sed ptibus
                                        liberolectus nonet psryroin. Amet sed
                                        lorem posuere sit iaculis amet, ac urna.
                                        Adipiscing fames semper erat ac in
                                        suspendisse iaculis.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div className="col-md-2">
                            <div className="footer-menu">
                                <h5>About Us</h5>
                                <ul className="menu-list">
                                    <li className="menu-item">
                                        <a href="#">vision</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">articles </a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">careers</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">service terms</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">donate</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-md-2">
                            <div className="footer-menu">
                                <h5>Discover</h5>
                                <ul className="menu-list">
                                    <li className="menu-item">
                                        <a href="#">Home</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Books</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Authors</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Subjects</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Advanced Search</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-md-2">
                            <div className="footer-menu">
                                <h5>My account</h5>
                                <ul className="menu-list">
                                    <li className="menu-item">
                                        <a href="#">Sign In</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">View Cart</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">My Wishtlist</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Track My Order</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-md-2">
                            <div className="footer-menu">
                                <h5>Help</h5>
                                <ul className="menu-list">
                                    <li className="menu-item">
                                        <a href="#">Help center</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Report a problem</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Suggesting edits</a>
                                    </li>
                                    <li className="menu-item">
                                        <a href="#">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <div id="footer-bottom">
                <div className="container">
                    <div className="row">
                        <div className="col-md-12">
                            <div className="copyright">
                                <div className="row">
                                    <div className="col-md-6">
                                        <p>
                                            © 2022 All rights reserved. Free
                                            HTML Template by{" "}
                                            <a
                                                href="https://www.templatesjungle.com/"
                                                target="_blank"
                                            >
                                                TemplatesJungle
                                            </a>
                                        </p>
                                    </div>

                                    <div className="col-md-6">
                                        <div className="social-links align-right">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i className="icon icon-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i className="icon icon-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i className="icon icon-youtube-play"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i className="icon icon-behance-square"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
}

if (document.getElementById("root")) {
    createRoot(document.getElementById("root")).render(<App />);
}
