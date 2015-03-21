--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: client; Type: TABLE; Schema: public; Owner: epicodus; Tablespace: 
--

CREATE TABLE client (
    id integer NOT NULL,
    name character varying,
    stylist_id integer
);


ALTER TABLE client OWNER TO epicodus;

--
-- Name: client_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus
--

CREATE SEQUENCE client_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE client_id_seq OWNER TO epicodus;

--
-- Name: client_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus
--

ALTER SEQUENCE client_id_seq OWNED BY client.id;


--
-- Name: stylist; Type: TABLE; Schema: public; Owner: epicodus; Tablespace: 
--

CREATE TABLE stylist (
    id integer NOT NULL,
    name character varying
);


ALTER TABLE stylist OWNER TO epicodus;

--
-- Name: stylist_id_seq; Type: SEQUENCE; Schema: public; Owner: epicodus
--

CREATE SEQUENCE stylist_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE stylist_id_seq OWNER TO epicodus;

--
-- Name: stylist_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: epicodus
--

ALTER SEQUENCE stylist_id_seq OWNED BY stylist.id;


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus
--

ALTER TABLE ONLY client ALTER COLUMN id SET DEFAULT nextval('client_id_seq'::regclass);


--
-- Name: id; Type: DEFAULT; Schema: public; Owner: epicodus
--

ALTER TABLE ONLY stylist ALTER COLUMN id SET DEFAULT nextval('stylist_id_seq'::regclass);


--
-- Data for Name: client; Type: TABLE DATA; Schema: public; Owner: epicodus
--

COPY client (id, name, stylist_id) FROM stdin;
\.


--
-- Name: client_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus
--

SELECT pg_catalog.setval('client_id_seq', 1, false);


--
-- Data for Name: stylist; Type: TABLE DATA; Schema: public; Owner: epicodus
--

COPY stylist (id, name) FROM stdin;
1	fds
2	fds
3	me
4	dfhsfjk
\.


--
-- Name: stylist_id_seq; Type: SEQUENCE SET; Schema: public; Owner: epicodus
--

SELECT pg_catalog.setval('stylist_id_seq', 4, true);


--
-- Name: client_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus; Tablespace: 
--

ALTER TABLE ONLY client
    ADD CONSTRAINT client_pkey PRIMARY KEY (id);


--
-- Name: stylist_pkey; Type: CONSTRAINT; Schema: public; Owner: epicodus; Tablespace: 
--

ALTER TABLE ONLY stylist
    ADD CONSTRAINT stylist_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: epicodus
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM epicodus;
GRANT ALL ON SCHEMA public TO epicodus;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

