<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

      @if (Auth::user()->status == 'nonactive')
        <li class="nav-item">
          <a class="nav-link " href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis'}}">
            <i class="bi bi-speedometer"></i>
            <span>Confirmation</span>
          </a>
        </li>
      @endif

      @if (Auth::user()->status == 'active')
        <li class="nav-item">
          <a class="nav-link " href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis'}}">
            <i class="bi bi-speedometer"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <!-- End Dashboard Nav -->

        <li class="nav-item">
          <!-- collapsed -->
          <a class="nav-link collapsed" data-bs-target="#berita-nav" data-bs-toggle="collapse" >
            <i class="bi bi-journal-text"></i><span>Kelola Berita</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="berita-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/{{ Auth::user()->level == 'admin' ? 'admin' : 'jurnalis' }}/semua_berita">
                <i class="bi bi-circle"></i><span>Semua Berita</span>
              </a>
            </li>
            @if (Auth::user()->level == 'admin')
            <li>
              <a href="/admin/berita_terkini">
                <i class="bi bi-circle"></i><span>Berita Terkini</span>
              </a>
            </li>  
            @endif
            @if (Auth::user()->level == 'admin')
            <li>
              <a href="/admin/berita_populer">
                <i class="bi bi-circle"></i><span>Berita Populer</span>
              </a>
            </li>  
            @endif
            @if (Auth::user()->level == 'admin')
            <li>
              <a href="/admin/kategori_berita">
                <i class="bi bi-circle"></i><span>Kategori Berita</span>
              </a>
            </li>
            @endif
            @if (Auth::user()->level == 'admin')
            <li>
              <a href="/admin/headline">
                <i class="bi bi-circle"></i><span>Headline</span>
              </a>
            </li>
            @endif
          </ul>
        </li><!-- End Berita Nav -->
        
        @if(Auth::user()->level == 'admin')
        <li class="nav-item">
          <!-- collapsed -->
          <a class="nav-link collapsed" data-bs-target="#jurnalis-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-person-fill-gear"></i><span>Jurnalis</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="jurnalis-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="/admin/kelola_jurnalis">
                <i class="bi bi-circle"></i><span>Kelola Jurnalis</span>
              </a>
            </li>
            <li>
              <a href="/persetujuan_berita">
                <i class="bi bi-circle"></i><span>Persetujuan Berita</span>
              </a>
            </li>
          </ul>
        </li><!-- End Jurnalis Nav -->
        @endif
        @if(Auth::user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link collapsed" href="/komentar">
            <i class="bi bi-chat-left-text-fill"></i>
            <span>Kelola Komentar</span>
          </a>
        </li><!-- End Dashboard Nav -->
        @endif
        @if(Auth::user()->level == 'admin')
        <li class="nav-item">
          <a class="nav-link collapsed" href="/analisis">
            <i class="bi bi-graph-up"></i>
            <span>Analisis Berita</span>
          </a>
        </li><!-- End Dashboard Nav -->
        @endif
      @endif  
    </ul>

  </aside>