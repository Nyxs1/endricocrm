--
-- PostgreSQL database dump
--

\restrict 6ZavpIAbrioMHfIfiCXpAaUeipHQKiBCL9624o7Jn6l2MqTcxuhGpMmCrHTRDfO

-- Dumped from database version 18.0
-- Dumped by pg_dump version 18.0

-- Started on 2025-12-16 08:26:03

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET transaction_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 225 (class 1259 OID 16936)
-- Name: cache; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache (
    key character varying(255) NOT NULL,
    value text NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache OWNER TO postgres;

--
-- TOC entry 226 (class 1259 OID 16946)
-- Name: cache_locks; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.cache_locks (
    key character varying(255) NOT NULL,
    owner character varying(255) NOT NULL,
    expiration integer NOT NULL
);


ALTER TABLE public.cache_locks OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 17036)
-- Name: customers; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.customers (
    id bigint NOT NULL,
    lead_id bigint,
    customer_code character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    phone character varying(255),
    email character varying(255),
    address text,
    subscribed_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.customers OWNER TO postgres;

--
-- TOC entry 236 (class 1259 OID 17035)
-- Name: customers_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.customers_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.customers_id_seq OWNER TO postgres;

--
-- TOC entry 5168 (class 0 OID 0)
-- Dependencies: 236
-- Name: customers_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.customers_id_seq OWNED BY public.customers.id;


--
-- TOC entry 231 (class 1259 OID 16987)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 230 (class 1259 OID 16986)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 5169 (class 0 OID 0)
-- Dependencies: 230
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 229 (class 1259 OID 16972)
-- Name: job_batches; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.job_batches (
    id character varying(255) NOT NULL,
    name character varying(255) NOT NULL,
    total_jobs integer NOT NULL,
    pending_jobs integer NOT NULL,
    failed_jobs integer NOT NULL,
    failed_job_ids text NOT NULL,
    options text,
    cancelled_at integer,
    created_at integer NOT NULL,
    finished_at integer
);


ALTER TABLE public.job_batches OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 16957)
-- Name: jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.jobs (
    id bigint NOT NULL,
    queue character varying(255) NOT NULL,
    payload text NOT NULL,
    attempts smallint NOT NULL,
    reserved_at integer,
    available_at integer NOT NULL,
    created_at integer NOT NULL
);


ALTER TABLE public.jobs OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 16956)
-- Name: jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.jobs_id_seq OWNER TO postgres;

--
-- TOC entry 5170 (class 0 OID 0)
-- Dependencies: 227
-- Name: jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.jobs_id_seq OWNED BY public.jobs.id;


--
-- TOC entry 233 (class 1259 OID 17008)
-- Name: leads; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.leads (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    phone character varying(255),
    email character varying(255),
    address text,
    status character varying(255) DEFAULT 'new'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    description text
);


ALTER TABLE public.leads OWNER TO postgres;

--
-- TOC entry 232 (class 1259 OID 17007)
-- Name: leads_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.leads_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.leads_id_seq OWNER TO postgres;

--
-- TOC entry 5171 (class 0 OID 0)
-- Dependencies: 232
-- Name: leads_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.leads_id_seq OWNED BY public.leads.id;


--
-- TOC entry 220 (class 1259 OID 16891)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 219 (class 1259 OID 16890)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 5172 (class 0 OID 0)
-- Dependencies: 219
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 223 (class 1259 OID 16915)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 243 (class 1259 OID 17108)
-- Name: project_services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.project_services (
    id bigint NOT NULL,
    project_id bigint NOT NULL,
    service_id bigint NOT NULL,
    qty integer DEFAULT 1 NOT NULL,
    price_snapshot numeric(12,2) DEFAULT '0'::numeric NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.project_services OWNER TO postgres;

--
-- TOC entry 242 (class 1259 OID 17107)
-- Name: project_services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.project_services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.project_services_id_seq OWNER TO postgres;

--
-- TOC entry 5173 (class 0 OID 0)
-- Dependencies: 242
-- Name: project_services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.project_services_id_seq OWNED BY public.project_services.id;


--
-- TOC entry 239 (class 1259 OID 17055)
-- Name: projects; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.projects (
    id bigint NOT NULL,
    lead_id bigint NOT NULL,
    created_by bigint NOT NULL,
    reviewed_by bigint,
    status character varying(255) DEFAULT 'draft'::character varying NOT NULL,
    manager_note text,
    submitted_at timestamp(0) without time zone,
    approved_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    description text
);


ALTER TABLE public.projects OWNER TO postgres;

--
-- TOC entry 238 (class 1259 OID 17054)
-- Name: projects_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.projects_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.projects_id_seq OWNER TO postgres;

--
-- TOC entry 5174 (class 0 OID 0)
-- Dependencies: 238
-- Name: projects_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.projects_id_seq OWNED BY public.projects.id;


--
-- TOC entry 235 (class 1259 OID 17021)
-- Name: services; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.services (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    speed character varying(255),
    price numeric(12,2) DEFAULT '0'::numeric NOT NULL,
    is_active boolean DEFAULT true NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    description text,
    features text
);


ALTER TABLE public.services OWNER TO postgres;

--
-- TOC entry 234 (class 1259 OID 17020)
-- Name: services_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.services_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.services_id_seq OWNER TO postgres;

--
-- TOC entry 5175 (class 0 OID 0)
-- Dependencies: 234
-- Name: services_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.services_id_seq OWNED BY public.services.id;


--
-- TOC entry 224 (class 1259 OID 16924)
-- Name: sessions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.sessions (
    id character varying(255) NOT NULL,
    user_id bigint,
    ip_address character varying(45),
    user_agent text,
    payload text NOT NULL,
    last_activity integer NOT NULL
);


ALTER TABLE public.sessions OWNER TO postgres;

--
-- TOC entry 241 (class 1259 OID 17084)
-- Name: subscriptions; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.subscriptions (
    id bigint NOT NULL,
    customer_id bigint NOT NULL,
    service_id bigint NOT NULL,
    start_date date,
    status character varying(255) DEFAULT 'active'::character varying NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.subscriptions OWNER TO postgres;

--
-- TOC entry 240 (class 1259 OID 17083)
-- Name: subscriptions_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.subscriptions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.subscriptions_id_seq OWNER TO postgres;

--
-- TOC entry 5176 (class 0 OID 0)
-- Dependencies: 240
-- Name: subscriptions_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.subscriptions_id_seq OWNED BY public.subscriptions.id;


--
-- TOC entry 222 (class 1259 OID 16901)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    role character varying(255) DEFAULT 'sales'::character varying NOT NULL
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 221 (class 1259 OID 16900)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 5177 (class 0 OID 0)
-- Dependencies: 221
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4932 (class 2604 OID 17039)
-- Name: customers id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers ALTER COLUMN id SET DEFAULT nextval('public.customers_id_seq'::regclass);


--
-- TOC entry 4925 (class 2604 OID 16990)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4924 (class 2604 OID 16960)
-- Name: jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs ALTER COLUMN id SET DEFAULT nextval('public.jobs_id_seq'::regclass);


--
-- TOC entry 4927 (class 2604 OID 17011)
-- Name: leads id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads ALTER COLUMN id SET DEFAULT nextval('public.leads_id_seq'::regclass);


--
-- TOC entry 4921 (class 2604 OID 16894)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4937 (class 2604 OID 17111)
-- Name: project_services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.project_services ALTER COLUMN id SET DEFAULT nextval('public.project_services_id_seq'::regclass);


--
-- TOC entry 4933 (class 2604 OID 17058)
-- Name: projects id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects ALTER COLUMN id SET DEFAULT nextval('public.projects_id_seq'::regclass);


--
-- TOC entry 4929 (class 2604 OID 17024)
-- Name: services id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services ALTER COLUMN id SET DEFAULT nextval('public.services_id_seq'::regclass);


--
-- TOC entry 4935 (class 2604 OID 17087)
-- Name: subscriptions id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subscriptions ALTER COLUMN id SET DEFAULT nextval('public.subscriptions_id_seq'::regclass);


--
-- TOC entry 4922 (class 2604 OID 16904)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 5144 (class 0 OID 16936)
-- Dependencies: 225
-- Data for Name: cache; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache (key, value, expiration) FROM stdin;
\.


--
-- TOC entry 5145 (class 0 OID 16946)
-- Dependencies: 226
-- Data for Name: cache_locks; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.cache_locks (key, owner, expiration) FROM stdin;
\.


--
-- TOC entry 5156 (class 0 OID 17036)
-- Dependencies: 237
-- Data for Name: customers; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.customers (id, lead_id, customer_code, name, phone, email, address, subscribed_at, created_at, updated_at) FROM stdin;
1	5	CUST-0003	Sekolah Internasional	021-99887766	admin@sekolahinternasional.edu	Jl. Pondok Indah No. 654, Jakarta Selatan	2025-12-15 17:15:27	2025-12-15 17:15:27	2025-12-15 17:15:27
2	4	CUST-6USILS	Cafe Modern	021-55667788	owner@cafemodern.com	Jl. Kemang Raya No. 321, Jakarta Selatan	2025-12-15 20:03:18	2025-12-15 20:03:18	2025-12-15 20:03:18
\.


--
-- TOC entry 5150 (class 0 OID 16987)
-- Dependencies: 231
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
\.


--
-- TOC entry 5148 (class 0 OID 16972)
-- Dependencies: 229
-- Data for Name: job_batches; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.job_batches (id, name, total_jobs, pending_jobs, failed_jobs, failed_job_ids, options, cancelled_at, created_at, finished_at) FROM stdin;
\.


--
-- TOC entry 5147 (class 0 OID 16957)
-- Dependencies: 228
-- Data for Name: jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.jobs (id, queue, payload, attempts, reserved_at, available_at, created_at) FROM stdin;
\.


--
-- TOC entry 5152 (class 0 OID 17008)
-- Dependencies: 233
-- Data for Name: leads; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.leads (id, name, phone, email, address, status, created_at, updated_at, description) FROM stdin;
2	CV. Digital Solutions	021-87654321	contact@digitalsolutions.id	Jl. Gatot Subroto No. 456, Jakarta Selatan	warm	2025-12-15 17:15:27	2025-12-15 17:15:27	Startup digital yang memerlukan koneksi internet stabil untuk development
3	Hotel Bintang Lima	021-11223344	manager@hotelbintanglima.com	Jl. Thamrin No. 789, Jakarta Pusat	warm	2025-12-15 17:15:27	2025-12-15 17:15:27	Hotel yang ingin upgrade sistem WiFi untuk tamu
1	PT. Teknologi Maju	021-12345678	info@teknologimaju.com	Jl. Sudirman No. 123, Jakarta Pusat	in_project	2025-12-15 17:15:27	2025-12-15 19:06:32	Perusahaan teknologi yang membutuhkan internet dedicated untuk kantor pusat
5	Sekolah Internasional	021-99887766	admin@sekolahinternasional.edu	Jl. Pondok Indah No. 654, Jakarta Selatan	in_project	2025-12-15 17:15:27	2025-12-15 19:16:50	Sekolah yang memerlukan internet untuk e-learning dan administrasi
4	Cafe Modern	021-55667788	owner@cafemodern.com	Jl. Kemang Raya No. 321, Jakarta Selatan	in_project	2025-12-15 17:15:27	2025-12-15 19:18:45	Cafe yang membutuhkan WiFi hotspot untuk pelanggan
\.


--
-- TOC entry 5139 (class 0 OID 16891)
-- Dependencies: 220
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.migrations (id, migration, batch) FROM stdin;
1	0001_01_01_000000_create_users_table	1
2	0001_01_01_000001_create_cache_table	1
3	0001_01_01_000002_create_jobs_table	1
4	2025_12_15_084618_add_role_to_users_table	1
5	2025_12_15_084618_create_leads_table	1
6	2025_12_15_084618_create_services_table	1
7	2025_12_15_084619_create_customers_table	1
8	2025_12_15_084619_create_projects_table	1
9	2025_12_15_084619_create_subscriptions_table	1
10	2025_12_15_091006_create_project_services_table	1
11	2025_12_15_171102_add_description_to_services_table	1
12	2025_12_15_171129_add_description_to_leads_table	1
14	2025_12_15_171249_add_description_to_projects_table	2
\.


--
-- TOC entry 5142 (class 0 OID 16915)
-- Dependencies: 223
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.password_reset_tokens (email, token, created_at) FROM stdin;
\.


--
-- TOC entry 5162 (class 0 OID 17108)
-- Dependencies: 243
-- Data for Name: project_services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.project_services (id, project_id, service_id, qty, price_snapshot, created_at, updated_at) FROM stdin;
1	1	3	1	0.00	2025-12-15 17:15:27	2025-12-15 17:15:27
2	2	2	1	0.00	2025-12-15 17:15:27	2025-12-15 17:15:27
3	3	1	1	0.00	2025-12-15 17:15:27	2025-12-15 17:15:27
4	4	3	1	3000000.00	2025-12-15 19:06:32	2025-12-15 19:06:32
5	5	1	1	500000.00	2025-12-15 19:16:50	2025-12-15 19:16:50
6	5	2	1	1200000.00	2025-12-15 19:16:50	2025-12-15 19:16:50
7	6	3	1	3000000.00	2025-12-15 19:18:45	2025-12-15 19:18:45
8	6	2	1	1200000.00	2025-12-15 19:18:45	2025-12-15 19:18:45
\.


--
-- TOC entry 5158 (class 0 OID 17055)
-- Dependencies: 239
-- Data for Name: projects; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.projects (id, lead_id, created_by, reviewed_by, status, manager_note, submitted_at, approved_at, created_at, updated_at, description) FROM stdin;
3	5	1	\N	completed	\N	\N	\N	2025-12-15 17:15:27	2025-12-15 17:15:27	\N
4	1	3	\N	draft	\N	\N	\N	2025-12-15 19:06:31	2025-12-15 19:06:31	\N
5	5	3	\N	pending	\N	2025-12-15 19:17:02	\N	2025-12-15 19:16:50	2025-12-15 19:17:02	\N
1	1	1	\N	pending	\N	2025-12-15 19:52:35	\N	2025-12-15 17:15:27	2025-12-15 19:52:35	\N
6	4	2	3	converted	\N	2025-12-15 19:18:49	2025-12-15 20:03:18	2025-12-15 19:18:45	2025-12-15 20:03:18	\N
2	2	1	3	rejected	ga jadi beli	\N	\N	2025-12-15 17:15:27	2025-12-15 20:03:30	\N
\.


--
-- TOC entry 5154 (class 0 OID 17021)
-- Dependencies: 235
-- Data for Name: services; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.services (id, name, speed, price, is_active, created_at, updated_at, description, features) FROM stdin;
1	Internet Fiber 100Mbps	100Mbps	500000.00	t	2025-12-15 17:15:27	2025-12-15 17:15:27	Paket internet fiber optic dengan kecepatan 100Mbps untuk kebutuhan rumah dan kantor kecil	\N
2	Internet Fiber 500Mbps	500Mbps	1200000.00	t	2025-12-15 17:15:27	2025-12-15 17:15:27	Paket internet fiber optic dengan kecepatan 500Mbps untuk kebutuhan bisnis menengah	\N
3	Internet Dedicated 1Gbps	1Gbps	3000000.00	t	2025-12-15 17:15:27	2025-12-15 17:15:27	Paket internet dedicated dengan kecepatan 1Gbps untuk kebutuhan enterprise	\N
4	WiFi Hotspot Management	Various	800000.00	t	2025-12-15 17:15:27	2025-12-15 17:15:27	Layanan manajemen WiFi hotspot untuk hotel, cafe, dan area publik	\N
\.


--
-- TOC entry 5143 (class 0 OID 16924)
-- Dependencies: 224
-- Data for Name: sessions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.sessions (id, user_id, ip_address, user_agent, payload, last_activity) FROM stdin;
\.


--
-- TOC entry 5160 (class 0 OID 17084)
-- Dependencies: 241
-- Data for Name: subscriptions; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.subscriptions (id, customer_id, service_id, start_date, status, created_at, updated_at) FROM stdin;
1	1	1	2025-11-15	active	2025-12-15 17:15:27	2025-12-15 17:15:27
2	2	2	2025-12-15	active	2025-12-15 20:03:18	2025-12-15 20:03:18
3	2	3	2025-12-15	active	2025-12-15 20:03:18	2025-12-15 20:03:18
\.


--
-- TOC entry 5141 (class 0 OID 16901)
-- Dependencies: 222
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at, role) FROM stdin;
1	Admin User	admin@endrico.com	\N	$2y$12$pEBUUo5xCYb1N4iigU5aE.VUujSJAt/cBvUSu3twNJtyE8sjl9.t.	\N	2025-12-15 17:15:27	2025-12-15 17:15:27	sales
2	Sales Demo	sales@demo.com	\N	$2y$12$o7arfw3xFy7rJvJIkHWFSusT2E3ypi9CLHuSmB6AK/L4k5U5fBIMW	\N	2025-12-15 17:53:02	2025-12-15 19:51:03	sales
3	Manager Demo	manager@demo.com	\N	$2y$12$b.I6njGPNEKh4yHmVKi3N.9oT8sLMk7RTkhJfFsTCEsWjEPYRqEy.	\N	2025-12-15 17:53:03	2025-12-15 19:51:03	manager
\.


--
-- TOC entry 5178 (class 0 OID 0)
-- Dependencies: 236
-- Name: customers_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.customers_id_seq', 34, true);


--
-- TOC entry 5179 (class 0 OID 0)
-- Dependencies: 230
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 5180 (class 0 OID 0)
-- Dependencies: 227
-- Name: jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.jobs_id_seq', 1, false);


--
-- TOC entry 5181 (class 0 OID 0)
-- Dependencies: 232
-- Name: leads_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.leads_id_seq', 5, true);


--
-- TOC entry 5182 (class 0 OID 0)
-- Dependencies: 219
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 14, true);


--
-- TOC entry 5183 (class 0 OID 0)
-- Dependencies: 242
-- Name: project_services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.project_services_id_seq', 8, true);


--
-- TOC entry 5184 (class 0 OID 0)
-- Dependencies: 238
-- Name: projects_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.projects_id_seq', 6, true);


--
-- TOC entry 5185 (class 0 OID 0)
-- Dependencies: 234
-- Name: services_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.services_id_seq', 4, true);


--
-- TOC entry 5186 (class 0 OID 0)
-- Dependencies: 240
-- Name: subscriptions_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.subscriptions_id_seq', 34, true);


--
-- TOC entry 5187 (class 0 OID 0)
-- Dependencies: 221
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 3, true);


--
-- TOC entry 4955 (class 2606 OID 16955)
-- Name: cache_locks cache_locks_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache_locks
    ADD CONSTRAINT cache_locks_pkey PRIMARY KEY (key);


--
-- TOC entry 4953 (class 2606 OID 16945)
-- Name: cache cache_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.cache
    ADD CONSTRAINT cache_pkey PRIMARY KEY (key);


--
-- TOC entry 4970 (class 2606 OID 17053)
-- Name: customers customers_customer_code_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_customer_code_unique UNIQUE (customer_code);


--
-- TOC entry 4972 (class 2606 OID 17046)
-- Name: customers customers_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_pkey PRIMARY KEY (id);


--
-- TOC entry 4962 (class 2606 OID 17002)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4964 (class 2606 OID 17004)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4960 (class 2606 OID 16985)
-- Name: job_batches job_batches_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.job_batches
    ADD CONSTRAINT job_batches_pkey PRIMARY KEY (id);


--
-- TOC entry 4957 (class 2606 OID 16970)
-- Name: jobs jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.jobs
    ADD CONSTRAINT jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4966 (class 2606 OID 17019)
-- Name: leads leads_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.leads
    ADD CONSTRAINT leads_pkey PRIMARY KEY (id);


--
-- TOC entry 4941 (class 2606 OID 16899)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4947 (class 2606 OID 16923)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4980 (class 2606 OID 17120)
-- Name: project_services project_services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.project_services
    ADD CONSTRAINT project_services_pkey PRIMARY KEY (id);


--
-- TOC entry 4982 (class 2606 OID 17132)
-- Name: project_services project_services_project_id_service_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.project_services
    ADD CONSTRAINT project_services_project_id_service_id_unique UNIQUE (project_id, service_id);


--
-- TOC entry 4974 (class 2606 OID 17067)
-- Name: projects projects_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_pkey PRIMARY KEY (id);


--
-- TOC entry 4968 (class 2606 OID 17034)
-- Name: services services_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.services
    ADD CONSTRAINT services_pkey PRIMARY KEY (id);


--
-- TOC entry 4950 (class 2606 OID 16933)
-- Name: sessions sessions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.sessions
    ADD CONSTRAINT sessions_pkey PRIMARY KEY (id);


--
-- TOC entry 4976 (class 2606 OID 17106)
-- Name: subscriptions subscriptions_customer_id_service_id_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subscriptions
    ADD CONSTRAINT subscriptions_customer_id_service_id_unique UNIQUE (customer_id, service_id);


--
-- TOC entry 4978 (class 2606 OID 17094)
-- Name: subscriptions subscriptions_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subscriptions
    ADD CONSTRAINT subscriptions_pkey PRIMARY KEY (id);


--
-- TOC entry 4943 (class 2606 OID 16914)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4945 (class 2606 OID 16912)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4958 (class 1259 OID 16971)
-- Name: jobs_queue_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX jobs_queue_index ON public.jobs USING btree (queue);


--
-- TOC entry 4948 (class 1259 OID 16935)
-- Name: sessions_last_activity_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_last_activity_index ON public.sessions USING btree (last_activity);


--
-- TOC entry 4951 (class 1259 OID 16934)
-- Name: sessions_user_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX sessions_user_id_index ON public.sessions USING btree (user_id);


--
-- TOC entry 4983 (class 2606 OID 17047)
-- Name: customers customers_lead_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.customers
    ADD CONSTRAINT customers_lead_id_foreign FOREIGN KEY (lead_id) REFERENCES public.leads(id) ON DELETE SET NULL;


--
-- TOC entry 4989 (class 2606 OID 17121)
-- Name: project_services project_services_project_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.project_services
    ADD CONSTRAINT project_services_project_id_foreign FOREIGN KEY (project_id) REFERENCES public.projects(id) ON DELETE CASCADE;


--
-- TOC entry 4990 (class 2606 OID 17126)
-- Name: project_services project_services_service_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.project_services
    ADD CONSTRAINT project_services_service_id_foreign FOREIGN KEY (service_id) REFERENCES public.services(id) ON DELETE RESTRICT;


--
-- TOC entry 4984 (class 2606 OID 17073)
-- Name: projects projects_created_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_created_by_foreign FOREIGN KEY (created_by) REFERENCES public.users(id) ON DELETE CASCADE;


--
-- TOC entry 4985 (class 2606 OID 17068)
-- Name: projects projects_lead_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_lead_id_foreign FOREIGN KEY (lead_id) REFERENCES public.leads(id) ON DELETE CASCADE;


--
-- TOC entry 4986 (class 2606 OID 17078)
-- Name: projects projects_reviewed_by_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.projects
    ADD CONSTRAINT projects_reviewed_by_foreign FOREIGN KEY (reviewed_by) REFERENCES public.users(id) ON DELETE SET NULL;


--
-- TOC entry 4987 (class 2606 OID 17095)
-- Name: subscriptions subscriptions_customer_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subscriptions
    ADD CONSTRAINT subscriptions_customer_id_foreign FOREIGN KEY (customer_id) REFERENCES public.customers(id) ON DELETE CASCADE;


--
-- TOC entry 4988 (class 2606 OID 17100)
-- Name: subscriptions subscriptions_service_id_foreign; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.subscriptions
    ADD CONSTRAINT subscriptions_service_id_foreign FOREIGN KEY (service_id) REFERENCES public.services(id) ON DELETE RESTRICT;


-- Completed on 2025-12-16 08:26:03

--
-- PostgreSQL database dump complete
--

\unrestrict 6ZavpIAbrioMHfIfiCXpAaUeipHQKiBCL9624o7Jn6l2MqTcxuhGpMmCrHTRDfO

